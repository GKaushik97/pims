<?php

namespace App\Controllers\pims;

use App\Controllers\BaseController;

/**
 * DocumentRevisions
 */
class DocumentRevisions extends BaseController
{
    protected $documentRevisionsModel;

    public function __construct()
    {
        $this->documentRevisionsModel = model("App\Models\pims\DocumentRevisionsModel");
    }

    /**
     * Index Method
     */
    public function index(): string
    {
        $data["params"] = [
            "rows" => "10",
            "pageno" => "1",
            "sort_by" => "position",
            "sort_order" => "asc",
            "keywords" => "",
        ];
        $data['documentRevisions'] = $this->documentRevisionsModel->orderBy($data['params']['sort_by'], $data['params']['sort_order'])->findAll();
        $data["tRecords"] = $this->documentRevisionsModel->countAllResults();
        $data["max"] = $this->documentRevisionsModel->getMaxPosition();
        // print "<pre>"; print_r($data["max"]); print "</pre>";

        $data["page"] = [
            "title" => "Documents",
            "page_title" => "Document Revisions Module",
            "breadcrumb" => [["name" => "PIMS", "url" => "pims"]],
            'js' => ['documentRevisions'],
        ];

        return view("pims/documentRevisions/documentRevisions", $data);
    }

    /**
     * Index Body Method
     */
    public function indexBody(): string
    {
        $data["params"] = $this->request->getPost();
        $data['documentRevisions'] = [];
        $data["tRecords"] = $this->documentRevisionsModel->like("name", $data["params"]["keywords"])->countAllResults();
         $data["max"] = $this->documentRevisionsModel->getMaxPosition();
        if (isset($data['params']['keywords']) && !empty($data['params']['keywords'])) {
            $data['documentRevisions'] = $this->documentRevisionsModel->like('name', $data['params']['keywords'])->orderBy($data['params']['sort_by'], $data['params']['sort_order'])->findAll();
        }
        else {
            $data['documentRevisions'] = $this->documentRevisionsModel->orderBy($data['params']['sort_by'], $data['params']['sort_order'])->findAll();

        }
        return view("pims/documentRevisions/documentRevisions_body", $data);
    }

    /**
     * To Add Document Revision
     */
    public function add(): string
    {
        return view("pims/documentRevisions/documentRevisions_add");
    }

    /**
     * To Create Document Revision
     */
    public function create(): string
    {
        if ($this->request->getPost(csrf_token()) === csrf_hash()) {
            $rules = array(
                "name" => ["label" => "Name", "rules" => "required"],
            );

            if ($this->validate($rules)) {
                $create_revision = array(
                    "name" => $this->request->getPost("name"),
                    'created_by' => session('user')['id'],
                );

               $this->documentRevisionsModel->insert($create_revision);
                 $add_revision = $this->documentRevisionsModel->insertID();

                $code = "P" . str_pad($add_revision, 4, '0', STR_PAD_LEFT);
                    $revisionCode = array(
                        'id' => $add_revision,
                        'code' => $code,
                    );

                    // Update documentRevisions code
                 $this->documentRevisionsModel->update($add_revision, $revisionCode);
                    return view("template/alert_modal", ["msg" => "Document Revisions Added successfullty!",]);
                } else {
                    return view("pims/documentRevisions/documentRevisions_add");
            }
        }
        return "";
    }
    /**
     * To Edit Document Revision
     */
    public function edit(): string
    {
        $id = $this->request->getGet("id");
        $data["documentRevision"] = $this->documentRevisionsModel->find($id);
        return view("pims/documentRevisions/documentRevisions_edit", $data);
    }

    /**
     * To Update Document Revision
     */
    public function update(): string
    {
        if ($this->request->getPost(csrf_token()) === csrf_hash()) {
            $id = $this->request->getPost("id");
            $rules = [
                "name" => ["label" => "Name", "rules" => "required"],
            ];
            if ($this->validate($rules)) {
                $update_revision = [
                    "name" => $this->request->getPost("name"),
                    'updated_by' => session('user')['id'],
                ];
                $this->documentRevisionsModel->update($id, $update_revision);
                return view("template/alert_modal", [ "msg" => "Department updated successfullty!"
                ]);
            } else {
                return view("pims/documentRevisions/documentRevisions_edit");
            }
        }
    }
    
    /**
     * To Delete Document Revision
     */
    public function delete(): string
    {
        $id = $this->request->getPost("id");
        $deleted_by = session('user')['id'];
        if ($this->documentRevisionsModel->delete($id)) {
            $this->documentRevisionsModel->update($id, ['deleted_by' => $deleted_by]);
            return view("template/alert_modal", ["msg" => "DocumentRevision deleted successfully!"]);
        }
    }
    /**
     * Move position
     */
    public function movePosition(): string
    {
        $id = $this->request->getPost('id');
        $position = (int)$this->request->getPost('position'); // Convert position to integer
        $revision = $this->documentRevisionsModel->find($id);

        if (!$revision) {
            return 'Revision not found!';
        }

        // Get the total number of revisions
        $totalRevisions = $this->documentRevisionsModel->countAllResults();

        // Check if the position is valid
        if ($position < 1 || $position > $totalRevisions) {
            return 'Invalid position!';
        }

        // Get the current position of the revision
        $currentPosition = $revision['position'];

        // Disable moving up if the revision is already at the first position
        if ($position == 1 && $currentPosition == 1) {
            return 'Cannot move up from first position!';
        }

        // Disable moving down if the revision is already at the last position
        if ($position == $totalRevisions && $currentPosition == $totalRevisions) {
            return 'Cannot move down from last position!';
        }

        // Get the revision at the target position
        $targetRevision = $this->documentRevisionsModel
            ->where('position', $position)
            ->first();

        // Swap positions of the current revision and the revision at the target position
        $this->documentRevisionsModel->update($revision['id'], ['position' => $position]);
        $this->documentRevisionsModel->update($targetRevision['id'], ['position' => $currentPosition]);

        return 'Position moved successfully!';
    }

}
