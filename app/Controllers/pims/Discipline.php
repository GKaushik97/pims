<?php

namespace App\Controllers\pims;

use App\Controllers\BaseController;

/**
 * Discipline
 */
class Discipline extends BaseController
{
    protected $disciplineModel;

    public function __construct()
    {
        $this->disciplineModel = model("App\Models\pims\DisciplineModel");

    }

    /**
     * Index Method
     */
    public function index(): string
    {
        $data["params"] = [
            "sort_by" => "code",
            "sort_order" => "asc",
            "keywords" => "",
        ];
        $data["discipline"] = $this->disciplineModel->getAllDisciplines($data['params']);
        $data['params']["tRecords"] = $this->disciplineModel->countAllDisciplines($data['params']);
        $data["page"] = [
            "title" => "Disciplines",
            "page_title" => "Disciplines Module",
            "breadcrumb" => [["name" => "PIMS", "url" => "pims"]],
            "js" => ["discipline"],
        ];

        return view("pims/disciplines/discipline", $data);
    }

        
    /**
    * Index Body Method
    */
    public function indexBody(): string
    {
        $data['params'] = $this->request->getPost();
        $data['params']["tRecords"] = $this->disciplineModel->countAllDisciplines($data['params']);
        $data["discipline"] = $this->disciplineModel->getAllDisciplines($data['params']);

        return view("pims/disciplines/discipline_body", $data);
    }

    /**
     * To add
     */
    public function add(): string
    {

        return view("pims/disciplines/add_discipline");
    }
    /**
     * To Create Disciplines
     */
    public function create(): string
    {
        if ($this->request->getPost(csrf_token()) == csrf_hash()) {
            $rules = [
                "code" => ["label" => "Code", "rules" => "required"],
                "name" => ["label" => "Name", "rules" => "required"],
             ];

            if ($this->validate($rules)) {
                $create_discipline = [
                    "code" => $this->request->getPost("code"),
                    "name" => $this->request->getPost("name"),
                    "created_by" => $this->session->get("user")["id"],
                ];

                $add_discipline = $this->disciplineModel->insert(
                    $create_discipline
                );
                return view("template/alert_modal", ["msg" => "Discipline Added successfully!"]);
            } else {
                return view("pims/disciplines/add_discipline");
            }
        }
    }

    /**
     * To Edit Disciplines
     */
    public function edit(): string
    {
        $id = $this->request->getGet("id");
        $data['discipline'] = $this->disciplineModel->find($id);
        return view("pims/disciplines/edit_discipline", $data);
    }

    /**
     * To Update Disciplines
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
                $update_discipline = [
                    "code" => $this->request->getPost("code"),
                    "name" => $this->request->getPost("name"),
                    "status" => $this->request->getPost("status"),
                    "updated_by" => $this->session->get("user")["id"],
                ];
                $this->disciplineModel->update($id, $update_discipline);
                return view("template/alert_modal", [ "msg" => "Discipline updated successfully!"]);
            } else {
                return view("pims/disciplines/edit_discipline");
            }
        }
    }
    
    /**
     * To Delete Disciplines
     */
    public function delete(): string
    {
        $id = $this->request->getPost("id");
        $deleted_by = $this->session->get("user")["id"];
        
        if ($this->disciplineModel->delete($id)) {
            $this->disciplineModel->update($id, ['deleted_by' => $deleted_by]);
            return view("template/alert_modal", ["msg" => "Discipline Deleted successfully!"]);
        }
    }
}
