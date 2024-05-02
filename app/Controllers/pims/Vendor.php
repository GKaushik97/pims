<?php

namespace App\Controllers\pims;

use App\Controllers\BaseController;

/**
 * Vendors
 */
class Vendor extends BaseController
{
    protected $vendorModel;

    public function __construct()
    {
        $this->vendorModel = model("App\Models\pims\VendorModel");
    }

    /**
     * Index Method
     */
    public function index(): string
    {
        $data["params"] = [
            "rows" => "10",
            "pageno" => "1",
            "sort_by" => "code",
            "sort_order" => "asc",
            "keywords" => "",
        ];
        $data["vendors"] = $this->vendorModel->getVendors($data['params']);;
        $data['tRecords'] = $this->vendorModel->getVendorsCount($data['params']);
        //print_r(session('user'));
        $data["page"] = [
            "title" => "Vendor",
            "page_title" => "Vendor Module",
            "breadcrumb" => [["name" => "PIMS", "url" => "pims"]],
            'js' => ['vendor'],
        ];

        return view("pims/vendors/vendors", $data);
    }

    /**
     * Index Body Method
     */
    public function indexBody(): string
    {
        $data["params"] = $this->request->getPost();
        $data['vendors'] = $this->vendorModel->getVendors($data['params']);
        $data['tRecords'] = $this->vendorModel->getVendorsCount($data['params']);
        return view("pims/vendors/vendor_body", $data);
    }


    /**
     * To Add Vendor
     */
    public function add(): string
    {
        return view("pims/vendors/vendor_add");
    }

    /**
     * To Create Vendor
     */
    public function create(): string
    {
        if ($this->request->getPost(csrf_token()) === csrf_hash()) {
            $rules = array(
                "name" => ["label" => "Name", "rules" => "required"],
                "contact_name" => ["label" => "Contact Name","rules"=> "required"],
                "contact_email" => ['label' => 'Contact Email', 'rules' => 'required|valid_email|is_unique[vendors.contact_email]'],
                "contact_phone" => ['label' => 'Contact Phone', 'rules' => 'required|numeric|exact_length[10]|is_unique[vendors.contact_phone]'],
           ) ;

            if ($this->validate($rules)) {
                $create_vendor = array(
                    "name" => $this->request->getPost("name"),
                    "contact_name" => $this->request->getPost("contact_name"),
                    "contact_email" => $this->request->getPost("contact_email"),
                    "contact_phone" => $this->request->getPost('contact_phone'),
                    'created_by' => session('user')['id'],
                );

                $this->vendorModel->insert($create_vendor);
                 $add_vendor = $this->vendorModel->insertID();

                $code = "V" . str_pad($add_vendor, 4, '0', STR_PAD_LEFT);
                    $vendorCode = array(
                        'id' => $add_vendor,
                        'code' => $code,
                    );

                    // Update Vendor code
                 $this->vendorModel->update($add_vendor, $vendorCode);
                    return view("template/alert_modal", ["msg" => "Vendor Added successfullty!",]);
                } else {
                    return view("pims/vendors/vendor_add");
            }
        }
    }

    /**
     * To Edit  Vedor
     */
    public function edit(): string
    {
        $id = $this->request->getGet("id");
        $data["vendor"] = $this->vendorModel->find($id);
        return view("pims/vendors/vendor_edit", $data);
    }

    /**
     * To Update Vendor
     */
    public function update(): string
    {
        if ($this->request->getPost(csrf_token()) === csrf_hash()) {
            $id = $this->request->getPost("id");
            $rules = array(
                "name" => ["label" => "Name", "rules" => "required"],
                "contact_name" => ["label" => "Contact Name", "rules" => "required"],
               'contact_email' => ['label' => 'Email', 'rules' => 'required|valid_email|is_unique[vendors.contact_email,id,'.$this->request->getPost('id').']'],
                'contact_phone' => ['label' => 'Contact Phone', 'rules' => 'required|numeric|exact_length[10]|is_unique[vendors.contact_phone,id,'.$this->request->getPost('id').']'],
            );
            if ($this->validate($rules)) {
                $update_vendor = array(
                    "name" => $this->request->getPost("name"),
                    "contact_name" => $this->request->getPost("contact_name"),
                    "contact_email" => $this->request->getPost("contact_email"),
                    "contact_phone" => $this->request->getPost("contact_phone"),
                    "updated_by" => session('user')['id'],

                );
                $this->vendorModel->update($id, $update_vendor);
                return view("template/alert_modal", [ "msg" => "Vendor updated successfullty!"
                ]);
            } else {
                return view("pims/vendors/vendor_edit");
            }
        }
    }
    
    /**
     * To Delete Vendor
     */
    public function delete(): string
    {
        $id = $this->request->getPost("id");
        $deleted_by = session('user')['id'];
        if ($this->vendorModel->delete($id)) {
            $this->vendorModel->update($id, ['deleted_by' => $deleted_by]);
            return view("template/alert_modal", ["msg" => "Vendor Deleted successfully!",]);
        }
    }
}
