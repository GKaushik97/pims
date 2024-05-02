<?php

namespace App\Controllers\pims;
use App\Controllers\BaseController;

/**
 * Document Type Controller
 *  
 */
class DocumentType extends BaseController
{
	private $documentTypeModel;
	public function __construct()
	{
		$this->documentTypeModel = model('App\Models\pims\DocumentTypeModel');
	}

    /**
     * Index Method
     */
    public function index(): string
    {
        $data["params"] = [
            "sort_by" => "created_at",
            "sort_order" => "desc",
            "keywords" => "",
        ];
        $data["doc_types"] = $this->documentTypeModel->getAllDocumentType($data['params']);
        $data['params']["tRecords"] = $this->documentTypeModel->countAllDocumentType($data['params']);
        $data["page"] = [
            "title" => "Document Types",
            "page_title" => "Document Types Module",
            "breadcrumb" => [["name" => "PIMS", "url" => "pims"]],
            "js" => ["documentType"],
        ];

        return view("pims/document_types/document_types", $data);
    }

        
    /**
    * Index Body Method
    */
    public function indexBody(): string
    {
        $data['params'] = $this->request->getPost();
        $data['params']["tRecords"] = $this->documentTypeModel->countAllDocumentType($data['params']);
        $data["doc_types"] = $this->documentTypeModel->getAllDocumentType($data['params']);

        return view("pims/document_types/document_type_body", $data);
    }


    /**
     * To add Document Type
     */
    public function add(): string
    {

        return view("pims/document_types/add_document_type");
    }

    /**
     * To Create Document Type
     */
    public function create(): string
    {
        if ($this->request->getPost(csrf_token()) == csrf_hash()) {
            $rules = [
                "code" => ["label" => "Code", "rules" => "required"],
                "name" => ["label" => "Name", "rules" => "required"],
             ];

            if ($this->validate($rules)) {
                $create_document_type = [
                    "code" => $this->request->getPost("code"),
                    "name" => $this->request->getPost("name"),
                    "created_by" => $this->session->get("user")["id"],
                ];

                $add_document_type = $this->documentTypeModel->insert(
                    $create_document_type
                );
                return view("template/alert_modal", ["msg" => "Document Type Added successfully!"]);
            } else {
                return view("pims/document_types/add_document_type");
            }
        }
    }

    /**
     * To Edit Document Type
     */
    public function edit(): string
    {
        $id = $this->request->getGet("id");
        $data['discipline'] = $this->documentTypeModel->find($id);
        return view("pims/document_types/edit_document_type", $data);
    }

    /**
     * To Update Document Type
     */
    public function update(): string
    {
        if ($this->request->getPost(csrf_token()) == csrf_hash()) {
            $id = $this->request->getPost("id");
            $rules = [
                "code" => ["label" => "Code", "rules" => "required"],
                "name" => ["label" => "Name", "rules" => "required"],
                "status" => ["label" => "Status", "rules" => "required"],
            ];
            if ($this->validate($rules)) {
                $update_document_type = [
                    "code" => $this->request->getPost("code"),
                    "name" => $this->request->getPost("name"),
                    "status" => $this->request->getPost("status"),
                    "updated_by" => $this->session->get("user")["id"],
                ];
                $this->documentTypeModel->update($id, $update_document_type);
                return view("template/alert_modal", [ "msg" => "Document Type updated successfully!"]);
            } else {
                return view("pims/document_types/edit_document_type");
            }
        }
    }
    
    /**
     * To Delete Document Type
     */
    public function delete(): string
    {
        $id = $this->request->getPost("id");
        $deleted_by = $this->session->get("user")["id"];
        
        if ($this->documentTypeModel->delete($id)) {
            $this->documentTypeModel->update($id, ['deleted_by' => $deleted_by]);
            return view("template/alert_modal", ["msg" => "Document Type Deleted successfully!"]);
        }
    }

}
