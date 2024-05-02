<?php

namespace App\Controllers\pims;

use App\Controllers\BaseController;

/**
 * Projects
 */
class Projects extends BaseController
{
    protected $projectsModel;
    private $clientModel;
    private $vendorModel;
    public function __construct()
    {
        $this->projectsModel = model("App\Models\pims\ProjectsModel");
        $this->clientModel = model("App\Models\pims\ClientModel");
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
            "sort_by" => "projects.code",
            "sort_order" => "asc",
            "keywords" => "",
        ];
        $data["projects"] = $this->projectsModel->getProjects($data['params']);;
        $data['tRecords'] = $this->projectsModel->getProjectsCount($data['params']);
        $data['clients'] = $this->clientModel->find();
        $data['vendors'] = $this->vendorModel->find();
        //print_r(session('user'));
        $data["page"] = [
            "title" => "Project",
            "page_title" => "Project Module",
            "breadcrumb" => [["name" => "PIMS", "url" => "pims"]],
            'js' => ['projects'],
        ];

        return view("pims/projects/projects", $data);
    }

    /**
     * Index Body Method
     */
    public function indexBody(): string
    {
        $data["params"] = $this->request->getPost();
        $data['projects'] = $this->projectsModel->getProjects($data['params']);
        $data['tRecords'] = $this->projectsModel->getProjectsCount($data['params']);
        $data['clients'] = $this->clientModel->find();
        $data['vendors'] = $this->vendorModel->find();
        return view("pims/projects/projects_body", $data);
    }

    /**
     * To Add Project
     */
    public function add(): string
    {
        $data['clients'] = $this->clientModel->find();
        $data['vendors'] = $this->vendorModel->find();
        return view("pims/projects/project_add", $data);
    }

    /**
     * To Create Project
     */
    public function create(): string
    {
        if ($this->request->getPost(csrf_token()) === csrf_hash()) {
            $rules = array(
                "name" => ["label" => "Name", "rules" => "required"],
                "client_id" => ["label" => "Client ID", "rules" => "required"],
                "vendor_id" => ["label" => "Vendor ID", "rules" => "required"],
                "pmc" => ["label" => "PMC", "rules" => "required"],
                "description" => ["label" => "Description","rules" => "required"],
                "epc" => ["label" => "EPC", "rules" => "required"],
                "start_date" => ["label" => "Start Date", "rules" => "required"],
                "end_date" => ["label" => "End Date", "rules" => "required"],
                "manager" => ["label" => "Manager", "rules" => "required"],
            );

            if ($this->validate($rules)) {
                $create_project = array(
                    "name" => $this->request->getPost("name"),
                    "description" => $this->request->getPost("description"),
                    "client_id" => $this->request->getPost("client_id"),
                    "vendor_id" => $this->request->getPost("vendor_id"),
                    "pmc" => $this->request->getPost("pmc"),
                    "epc" => $this->request->getPost("epc"),
                    'start_date' => date('Y-m-d', strtotime($this->request->getPost('start_date'))),
                    'end_date' => date('Y-m-d', strtotime($this->request->getPost('end_date'))),
                    "manager" => $this->request->getPost("manager"),
                    'created_by' => session('user')['id'],
                );

               $this->projectsModel->insert($create_project);
                 $add_project = $this->projectsModel->insertID();

                $code = "P" . str_pad($add_project, 4, '0', STR_PAD_LEFT);
                    $projectCode = array(
                        'id' => $add_project,
                        'code' => $code,
                    );

                    // Update Project code
                 $this->projectsModel->update($add_project, $projectCode);
                    return view("template/alert_modal", ["msg" => "Project Added successfullty!",]);
                } else {
                    $data['clients'] = $this->clientModel->find();
                    $data['vendors'] = $this->vendorModel->find();
                    return view("pims/projects/project_add", $data);
            }
        }
        return "";
    }


    /**
     * To Edit Project
     */
    public function edit(): string
    {
        $id = $this->request->getGet("id");
        $data["project"] = $this->projectsModel->find($id);
        $data['clients'] = $this->clientModel->find();
        $data['vendors'] = $this->vendorModel->find();
        return view("pims/projects/project_edit", $data);
    }

    /**
     * To Update Project
     */
    public function update(): string
    {
        if ($this->request->getPost(csrf_token()) === csrf_hash()) {
            $id = $this->request->getPost("id");
            $rules = array(
                "name" => ["label" => "Name", "rules" => "required"],
                "description" => ["label" => "Description","rules" => "required"],
                "client_id" => ["label" => "Client ID", "rules" => "required"],
                "vendor_id" => ["label" => "Vendor ID", "rules" => "required"],
                "pmc" => ["label" => "PMC", "rules" => "required"],
                "epc" => ["label" => "EPC", "rules" => "required"],
                "start_date" => ["label" => "Start Date", "rules" => "required"],
                "end_date" => ["label" => "End Date", "rules" => "required"],
                "manager" => ["label" => "Manager", "rules" => "required"],
            );

            if ($this->validate($rules)) {
                $update_project = array(
                    "name" => $this->request->getPost("name"),
                    "description" => $this->request->getPost("description"),
                    "client_id" => $this->request->getPost("client_id"),
                    "vendor_id" => $this->request->getPost("vendor_id"),
                    "pmc" => $this->request->getPost("pmc"),
                    "epc" => $this->request->getPost("epc"),
                    'start_date' => date('Y-m-d', strtotime($this->request->getPost('start_date'))),
                    'end_date' => date('Y-m-d', strtotime($this->request->getPost('end_date'))),
                    "manager" => $this->request->getPost("manager"),
                    "updated_by" => session("user")['id'],
                );

                $this->projectsModel->update($id, $update_project);
                return view("template/alert_modal", ["msg" => "Project updated successfully!"]);
            } else {
                $data['clients'] = $this->clientModel->find();
                $data['vendors'] = $this->vendorModel->find();
                return view("pims/projects/project_edit", $data);
            }
        }
        return "";
    }

    /**
     * To Delete Project
     */
    public function delete(): string
    {
        $id = $this->request->getPost("id");
        $deleted_by = session('user')['id'];
        if ($this->projectsModel->delete($id)) {
            $this->projectsModel->update($id, ['deleted_by' => $deleted_by]);
            return view("template/alert_modal", ["msg" => "Project deleted successfully!"]);
        }
    }
}
