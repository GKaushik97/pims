<?php

namespace App\Controllers\pims;

use App\Controllers\BaseController;

/**
 * Document Purposes Controller
 */
class DocumentPurposes extends BaseController 
{
	private $documentpurposeModel;
	/**
	 * constructor
	 */
	public function __construct()   
	{
		$this->documentpurposeModel = model('App\Models\pims\DocumentPurposesModel');
	}
	/**
	 * Default function
	 */
	public function index(): string 
	{
		$data['params'] = [
			'rows' => '10',
			'pageno' => '1',
			'sort_by' => 'code',
			'sort_order' => 'asc',
			'keywords' => '',
		];
		$data['params']['tRecords'] = $this->documentpurposeModel->countAllDocuments($data['params']);
		$data['document_purposes'] = $this->documentpurposeModel->getAllDocuments($data['params']);

		$data['page'] = array(
			'title' => 'DocumentPurposes Module',
			'page_title' => 'DocumentPurposes Module',
			'breadcrumb' => [['name' => 'PIMS', 'url' => 'pims']],
			'js' => ['DocumentPurpose'],
		);
		return view('pims/DocumentPurpose/documents',$data);

	}
	/**
	 * Document Body
	 */
	public function DocumentBody() 
	{
		$data['params'] = $this->request->getPost();
		$data['params']['tRecords'] = $this->documentpurposeModel->countAllDocuments($data['params']);
		$data['document_purposes'] = $this->documentpurposeModel->getAllDocuments($data['params']);
		return view('pims/DocumentPurpose/document_body',$data);
	}

	/**
	 * add DocumentPurpose
	 */
	public function add(): string 
	{
		return view('pims/DocumentPurpose/add_documentpurpose');
	}

	/**
	 * create DocumentPurpose
	 */
	public function create(): string
    {
        if ($this->request->getPost(csrf_token()) == csrf_hash()) {
            $rules = [
                'code' => ['label' => 'Code', 'rules' => 'required'],
                'name' => ['label' => 'Name', 'rules' => 'required'],
             ];

            if ($this->validate($rules)) {
                $create_d = [
                    'code' => $this->request->getPost('code'),
                    'name' => $this->request->getPost('name'),
                    'created_by' => $this->session->get('user')['id'],
                ];

                $add_document = $this->documentpurposeModel->insert(
                    $create_d
                );
                return view('template/alert_modal', ['msg' => 'Document Added successfully!']);
            } else {
                return view('pims/DocumentPurpose/add_documentpurpose');
            }
        } else {
                return view('template/alert_modal', ['msg' => 'CSRF token mismatch!']);

        }
    }
    /**
     * edit DocumentPurpose
     */
    public  function edit(): string 
    {
    	$id = $this->request->getGet('id');
    	$data['document_purposes'] = $this->documentpurposeModel->find($id);
    	return view('pims/DocumentPurpose/edit_documentpurpose',$data);

    }
    /**
     * update DocumentPurpose
     */
    public function update(): string
    {
        if ($this->request->getPost(csrf_token()) == csrf_hash()) {
        	$id = $this->request->getPost('id');
            $rules = [
                'code' => ['label' => 'Code', 'rules' => 'required'],
                'name' => ['label' => 'Name', 'rules' => 'required'],
                'status' => ['label' => 'Status','rules' => 'required'],
             ];

            if ($this->validate($rules)) {
                $update_document = [
                    'code' => $this->request->getPost('code'),
                    'name' => $this->request->getPost('name'),
                    'status' => $this->request->getPost('status'),
                    'updated_by' => $this->session->get('user')['id'],
                ];

                $this->documentpurposeModel->update($id,$update_document);        
                return view('template/alert_modal', ['msg' => 'Document updated successfully!']);
            } else {
                return view('pims/DocumentPurpose/edit_documentpurpose');
            }
        } else {
                return view('template/alert_modal', ['msg' => 'CSRF token mismatch!']);

        }
    }
    /**
     * delete DocumentPurpose
     */
    public function delete(): string 
    {
    	$id = $this->request->getPost('id');
    	$deleted_by = $this->session->get('user')['id'];

    	if ($this->documentpurposeModel->delete($id)) {
    		$this->documentpurposeModel->update($id,['deleted_by' => $deleted_by]);
    		return view('template/alert_modal',['msg' => 'document deleted successfully!']);
    	}
    }
}