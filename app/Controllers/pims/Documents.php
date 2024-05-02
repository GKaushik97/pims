<?php 
namespace App\Controllers\pims;
use App\Controllers\BaseController;
/**
 * Documents Controller 
 */
class Documents extends BaseController
{
	protected $edmsDocumentsModel;
	protected $edmsDocumentRevisionsModel;
	protected $projectsModel;
	protected $disciplineModel;
	protected $documentTypeModel;
	protected $documentStatusModel;
	protected $documentPurposesModel;
	protected $documentRevisionModel;
	protected $documentRevisionHistoryModel;
	public function __construct()
	{
		$this->edmsDocumentsModel = model('App\Models\pims\EDMSDocumentsModel');
		$this->edmsDocumentRevisionsModel = model('App\Models\pims\EdmsDocumentRevisionsModel');
		$this->projectsModel = model('App\Models\pims\ProjectsModel');
		$this->disciplineModel = model('App\Models\pims\DisciplineModel');
		$this->documentTypeModel = model('App\Models\pims\DocumentTypeModel');
		$this->documentStatusModel = model('App\Models\pims\DocumentStatusModel');
		$this->documentPurposesModel = model('App\Models\pims\DocumentPurposesModel');
		$this->documentRevisionModel = model('App\Models\pims\DocumentRevisionsModel');
		$this->documentRevisionHistoryModel = model('App\Models\pims\DocumentRevisionStatusHistoryModel');
	}

	/**
	 * To get the Total Document List
	 */ 
	public function index()
	{
		$data['params'] = array(
			'rows' => 10,
			'page_no' => 1,
			'sort_by' => 'ed.created_at',
			'sort_order' => 'desc',
			'keywords' => ''
		);
		$data['edms_documents'] = $this->edmsDocumentsModel->getEdmsDocumentList($data['params']);
		$data['tRecords'] = $this->edmsDocumentsModel->getEdmsDocumentListNum($data['params']);
		$data['page'] = array(
            'title' => 'Documents',
            'page_title' => 'Documents',
            'js' => ['documents'],
        );
		return view('pims/documents/documents', $data);
	}

	/**
	 * Index Body
	 */ 
	public function indexBody()
	{
		$data['params'] = $this->request->getPost();
		$data['edms_documents'] = $this->edmsDocumentsModel->getEdmsDocumentList($data['params']);
		$data['tRecords'] = $this->edmsDocumentsModel->getEdmsDocumentListNum($data['params']);
		return view('pims/documents/documents_body', $data);
	}

	/**
	 * To Add Document
	 */ 
	public function addDocument()
	{
		$data['projects'] = $this->projectsModel->find();
		$data['disciplines'] = $this->disciplineModel->find();
		$data['document_purposes'] = $this->documentPurposesModel->find();
		$data['document_revisions'] = $this->documentRevisionModel->find();
		$data['document_types'] = $this->documentTypeModel->find();
		return view('pims/documents/add_edms_document', $data);
	}

	/**
	 * To create Document
	 */
	public function createDocument()
	{
	 	if($this->request->getPost(csrf_token()) === csrf_hash()) {
		 	$rules = array(
		 		'project_id' => ['label' => 'Project', 'rules' => 'required|trim'],
		 		'origin' => ['label' => 'Origin', 'rules' => 'required|trim'],
		 		'discipline_id' => ['label' => 'Discipline', 'rules' => 'required|trim'],
		 		'document_purpose_id' => ['label' => 'Document Purpose', 'rules' => 'required|trim'],
		 		'document_revision_id' => ['label' => 'Document Revision', 'rules' => 'required|trim'],
		 		'document_type_id' => ['label' => 'Document Type', 'rules' => 'required|trim'],
		 		'version_number' => ['label' => 'Version Number', 'rules' => 'required|is_unique[edms_documents.version_number]'],
		 		'est_start_date' => ['label' => 'Est. Start Date', 'rules' => 'required|trim'],
		 		'est_end_date' => ['label' => 'Est. End Date', 'rules' => 'required|trim'],
		 		'start_date' => ['label' => 'Start Date', 'rules' => 'required|trim'],
		 		'document' => ['label' => 'Document', 'rules' => array('uploaded[document]', 'ext_in[document,pdf,png,jpeg,doc,docx,jpeg]', 'max_size[document,20480]')],
		 		'description' => ['label' => 'Description', 'rules' => 'required'],
		 	);
		 	$check = $this->validate($rules);
		 	if($check == TRUE) {
		 		$doc_value = $this->request->getFile('document');
		 		if($doc_value->isValid()) {
		 			$doc_name = $doc_value->getRandomName();
		 			$doc_value->move(DOCUMENTROOT."edms_docs/", $doc_name);
		 		}

		 		$create_document = array(
		 			'document' => $doc_name,
		 			'description' => $this->request->getPost('description'),
		 			'project_id' => $this->request->getPost('project_id'),
		 			'origin' => $this->request->getPost('origin'),
		 			'discipline_id' => $this->request->getPost('discipline_id'),
		 			'document_type_id' => $this->request->getPost('document_type_id'),
		 			'document_purpose_id' => $this->request->getPost('document_purpose_id'),
		 			'document_revision_id' => $this->request->getPost('document_revision_id'),
		 			'version_number' => $this->request->getPost('version_number'),
		 			'est_start_date' => date('Y-m-d', strtotime($this->request->getPost('est_start_date'))),
		 			'est_end_date' => date('Y-m-d', strtotime($this->request->getPost('est_end_date'))),
		 			'start_date' => date('Y-m-d'),
		 			'document_status_id' => 0,
		 			'created_at' => date('Y-m-d H:i'),
		 			'created_by' => $this->session->get('user')['id'],
		 		);
		 		$params = array(
		 			'project_id' => $this->request->getPost('project_id'),
		 			'discipline_id' => $this->request->getPost('discipline_id'),
		 		);
		 		$this->edmsDocumentsModel->manageProjectDiscipline($params);
		 		$pro_doc_count = $this->edmsDocumentsModel->getProjectDisciplineNum($params);
		 		$this->edmsDocumentsModel->insert($create_document);
		 		$doc_id = $this->edmsDocumentsModel->getInsertID();
		 		// Code Generation
		 		$doc_code = "B285"."-".str_pad($this->request->getPost('discipline_id'),3,"0",STR_PAD_LEFT)."-".str_pad($this->request->getPost('project_id'),3,"0",STR_PAD_LEFT)."-".str_pad($pro_doc_count[0]['count'],4,"0",STR_PAD_LEFT);	
		 		//EDMS Document Revision Insertion
		 		$doc_revision_add = array(
		 			'edms_document_id' => $doc_id,
		 			'document' => $doc_name,
		 			'document_purpose_id' => $this->request->getPost('document_purpose_id'),
		 			'document_revision_id' => $this->request->getPost('document_revision_id'),
		 			'version_number' => $this->request->getPost('version_number'),
		 			'description' => $this->request->getPost('description'),
		 			'created_at' => date('Y-m-d H:i'),
		 			'created_by' => $this->session->get('user')['id'],
		 		);
		 		$this->edmsDocumentRevisionsModel->insert($doc_revision_add);
		 		$doc_revision_id = $this->edmsDocumentRevisionsModel->getInsertID();

		 		$update_code = array(
		 			'code' => $doc_code,
		 			'edms_document_revision_id' => $doc_revision_id,
		 		);
		 		$this->edmsDocumentsModel->update($doc_id, $update_code);
		 		// EDMS Document Revision Status History
		 		$doc_status_add = array(
		 			'edms_document_revision_id' => $doc_revision_id,
		 			'document_status_id' => 0,
		 			'created_at' => date('Y-m-d H:i'),
		 			'created_by' => $this->session->get('user')['id'],
		 		);
		 		$this->documentRevisionHistoryModel->insert($doc_status_add);
		 		if($doc_id) {
            		$alert = array('color' => 'success', 'msg' => "Document Successfully Inserted");
		 		}
		 		else {
            		$alert = array('color' => 'danger', 'msg' => "Error in Inserting");
		 		}
		 	}
		 	else {
		 		$data['projects'] = $this->projectsModel->find();
		 		$data['disciplines'] = $this->disciplineModel->find();
		 		$data['document_purposes'] = $this->documentPurposesModel->find();
		 		$data['document_revisions'] = $this->documentRevisionModel->find();
				$data['document_types'] = $this->documentTypeModel->find();
		 		return view('pims/documents/add_edms_document', $data);
		 	}
	 	}
	 	else {
            $alert = array('color' => 'danger', 'msg' => "Error in Inserting!!Please Try Again");
	 	}
	 	return view('template/alert_modal',$alert);
	}

	/**
	 * To Edit Document
	 */ 
	public function editDocument()
	{
		$id = $this->request->getGet('id');
		$data['projects'] = $this->projectsModel->find();
		$data['disciplines'] = $this->disciplineModel->find();
		$data['document_purposes'] = $this->documentPurposesModel->find();
		$data['document_revisions'] = $this->documentRevisionModel->find();
		$data['document_types'] = $this->documentTypeModel->find();
		$documents_ext = $this->edmsDocumentsModel->where('id', $id)->find();
		foreach ($documents_ext as $d_key => $doc_value) {
			$data['documents'][$doc_value['id']] = $doc_value;
		}
		return view('pims/documents/edit_edms_document', $data);
	}

	/**
	 * To Verify Document
	 */ 
	public function verifyStatus()
	{
		$data['params'] = $this->request->getGet();
		$data['revision_document'] = $this->edmsDocumentsModel->getEdmsDocumentByID($data['params']['id']);
		$data['status_list'] = $this->documentStatusModel->where('type', $data['params']['type'])->find();
		return view("pims/documents/verify_status", $data);
	}

	/**
	 * To Update veification Status
	 */ 
	public function updateVerifyStatus()
	{
	 	if($this->request->getPost(csrf_token()) === csrf_hash()) {
			$data['params'] = $this->request->getPost();
	 		$rules = array(
	 			'verify_status' => array('label' => 'Verification Status', 'rules' => 'required'),
	 			'comments' => array('label' => 'Comments', 'rules' => 'required'),
	 		);
	 		$check = $this->validate($rules);
	 		if($check == TRUE) {
	 			$verify_edit = array(
	 				'verify_status' => $this->request->getPost('verify_status'),
	 				'updated_at' => date('Y-m-d H:i'),
	 				'updated_by' => $this->session->get('user')['id'],
	 			);
				$rev_doc_max_id = $this->edmsDocumentRevisionsModel->where('edms_document_id', $data['params']['id'])->orderBy('id','desc')->first();
				$rev_history_status = array(
					'edms_document_revision_id' => $rev_doc_max_id['id'],
					'document_status_id' => $this->request->getPost('verify_status'),
					'comments' => $this->request->getPost('comments'),
					'created_at' => date('Y-m-d H:i'),
					'created_by' => $this->session->get('user')['id'],
				);
				$this->documentRevisionHistoryModel->insert($rev_history_status);
				$this->edmsDocumentRevisionsModel->update($rev_doc_max_id['id'], $verify_edit);
	 			if($this->edmsDocumentsModel->where('id', $data['params']['id'])->set($verify_edit)->update()) {
					$alert = array('color' => 'succes', 'msg' => 'Verification Status Updated Successfully');
	 			}else {
					$alert = array('color' => 'danger', 'msg' => 'Error!! Please try again...');
	 			}
	 		}
	 		else {
				$data['revision_document'] = $this->edmsDocumentsModel->getEdmsDocumentByID($data['params']['id']);
				$data['status_list'] = $this->documentStatusModel->where('type', $data['params']['type'])->find();
	 			return view('pims/documents/verify_status', $data);
	 		}
		}
		else
		{
			$alert = array('color' => 'danger', 'msg' => 'Error!! Please try again...');
		}
		return view('template/alert_modal', $alert);
	}
	/**
	 * To Verify Document
	 */ 
	public function approveStatus()
	{
		$data['params'] = $this->request->getGet();
		$data['revision_document'] = $this->edmsDocumentsModel->getEdmsDocumentByID($data['params']['id']);
		$data['status_list_app'] = $this->documentStatusModel->where('type', $data['params']['type'])->find();
		return view("pims/documents/approve_status", $data);
	}

	/**
	 * To Update veification Status
	 */ 
	public function updateApproveStatus()
	{
	 	if($this->request->getPost(csrf_token()) === csrf_hash()) {
			$data['params'] = $this->request->getPost();
	 		$rules = array(
	 			'approve_status' => array('label' => 'Approval Status', 'rules' => 'required'),
	 			'comments' => array('label' => 'Comments', 'rules' => 'required'),
	 		);
	 		$check = $this->validate($rules);
	 		if($check == TRUE) {
	 			$approve_status_edit = array(
	 				'approve_status' => $this->request->getPost('approve_status'),
	 				'updated_at' => date('Y-m-d H:i'),
	 				'updated_by' => $this->session->get('user')['id'],
	 			);
	 			$rev_doc_id = $this->edmsDocumentRevisionsModel->where('edms_document_id', $data['params']['id'])->orderBy('id','desc')->first();
				$approve_history_status = array(
					'edms_document_revision_id' => $rev_doc_id['id'],
					'document_status_id' => $this->request->getPost('approve_status'),
					'comments' => $this->request->getPost('comments'),
					'created_at' => date('Y-m-d H:i'),
					'created_by' => $this->session->get('user')['id'],
				);
				$this->documentRevisionHistoryModel->insert($approve_history_status);
				$this->edmsDocumentRevisionsModel->update($rev_doc_id['id'], $approve_status_edit);
	 			if($this->edmsDocumentsModel->where('id', $data['params']['id'])->set($approve_status_edit)->update()) {
					$alert = array('color' => 'succes', 'msg' => 'Status Updated Successfully');
	 			}else {
					$alert = array('color' => 'danger', 'msg' => 'Error!! Please try again...');
	 			}
	 		}
	 		else {
				$data['revision_document'] = $this->edmsDocumentsModel->getEdmsDocumentByID($data['params']['id']);
				$data['status_list_app'] = $this->documentStatusModel->where('type', $data['params']['type'])->find();
	 			return view('pims/documents/approve_status', $data);
	 		}
		}
		else
		{
			$alert = array('color' => 'danger', 'msg' => 'Error!! Please try again...');
		}
		return view('template/alert_modal', $alert);
	}

	/**
	 * Add Revised Document
	 */ 
	public function addRevisedDocument()
	{
		$data['id'] = $this->request->getGet('id');
		$data['revision_document'] = $this->edmsDocumentsModel->getEdmsDocumentByID($data['id']);
		$data['document_purposes'] = $this->documentPurposesModel->find();
		$data['document_revisions'] = $this->documentRevisionModel->find();
		return view('pims/documents/add_revised_document', $data);
	}

	/**
	 * Update Revised Documents
	 */ 
	public function updateRevisedDocument()
	{
		if($this->request->getPost(csrf_token()) === csrf_hash()) {
			$data['id'] = $this->request->getPost('edms_document_id');
			$rules = array(
				'document' => ['label' => 'Document', 'rules' => ['uploaded[document]', 'ext_in[document,pdf,png,jpg,jpeg,doc,docx]', 'max_size[document,20480]']],
				'version_number' => ['label' => 'Version Number' , 'rules' => 'required|is_unique[edms_document_revisions.version_number]'],
				'document_revision_id' => ['label' => 'Document Revision', 'rules' => 'required'],
				'document_purpose_id' => ['label' => 'Document Purpose', 'rules' => 'required'],
				'description' => ['label' => 'Description', 'rules' => 'required'],
			);
			$check = $this->validate($rules);
			if($check == TRUE) {
				$file_upload = $this->request->getFile('document');
				if($file_upload->isValid()) {
					$file_name = $file_upload->getRandomName();
					$file_upload->move(DOCUMENTROOT.'edms_docs/', $file_name);
				}
				$add_rev_doc = array(
					'edms_document_id' => $this->request->getPost('edms_document_id'),
					'document' => $file_name,
					'document_purpose_id' => $this->request->getPost('document_purpose_id'),
					'document_revision_id' => $this->request->getPost('document_revision_id'),
					'version_number' => $this->request->getPost('version_number'),
					'description' => $this->request->getPost('description'),
					'created_at' => date('Y-m-d H:i'),
					'created_by' => $this->session->get('user')['id'],
				);
				$this->edmsDocumentRevisionsModel->insert($add_rev_doc);
				$rev_doc_id = $this->edmsDocumentRevisionsModel->getInsertID();
				$update_edms_doc_val = array(
					'edms_document_revision_id' => $rev_doc_id,
					'verify_status' => NULL,
					'approve_status' => NULL,
				);
				$this->edmsDocumentsModel->updateEdmsDocument($data['id'], $update_edms_doc_val);
				$add_rev_doc_history = array(
					'edms_document_revision_id' => $rev_doc_id,
					'document_status_id' => 0,
					'created_at' => date('Y-m-d H:i'),
					'created_by' => $this->session->get('user')['id'],
				);
				$this->documentRevisionHistoryModel->insert($add_rev_doc_history);
				if($rev_doc_id) {
					$alert = array('color' => 'success', 'msg' => 'Document Revision uploaded Successfully');
				}
				else {
					$alert = array('color' => 'danger', 'msg' => 'Error!! Please try again...');
				}
			}
			else {
				$data['revision_document'] = $this->edmsDocumentsModel->getEdmsDocumentByID($data['id']);
				$data['document_purposes'] = $this->documentPurposesModel->find();
				$data['document_revisions'] = $this->documentRevisionModel->find();
				return view('pims/documents/add_revised_document', $data);
			}
		}
		else {
			$alert = array('color' => 'danger', 'msg' => 'Error!! Please try again...');
		}
		return view('template/alert_modal', $alert);
	}

	/**
	 * To view Documents
	 */ 
	public function viewDocument()
	{
		$id = $this->request->getGet('id');
		$purposes = $this->documentPurposesModel->find();
		foreach($purposes as $p_k => $p_val) {
			$data['document_purposes'][$p_val['id']] = $p_val;
		}
		$revisions = $this->documentRevisionModel->find();
		foreach($revisions as $r_k => $r_val) {
			$data['document_revisions'][$r_val['id']] = $r_val;
		}
		$data['edms_document'] = $this->edmsDocumentsModel->getEdmsDocumentByID($id);
		$statusus = $this->documentStatusModel->find();
		foreach($statusus as $s_k => $status_val) {
			$data['status_list'][$status_val['id']] = $status_val;
		}
		$data['rev_doc_history_status'] = $this->documentRevisionHistoryModel->where('edms_document_revision_id', $data['edms_document']['revision_id'])->orderBy('id', 'desc')->find();
		// print "<pre>";print_r($data['rev_doc_history_status']); print "</pre>";exit;
		$data['revised_documents'] = $this->edmsDocumentRevisionsModel->where('edms_document_id', $id)->orderBy('id','desc')->find();
		$data['revised_doc_total'] = $this->edmsDocumentRevisionsModel->where('edms_document_id', $id)->countAllResults();
		return view('pims/documents/view_documents', $data);
	}
}