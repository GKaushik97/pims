<?php
namespace App\Controllers\pims;

use App\Controllers\BaseController;

/**
 * Document Status Controller
 */
class DocumentStatus extends BaseController
{
	private $documentStatusModel;
	public function __construct()
	{
		$this->documentStatusModel = model('App\Models\pims\DocumentStatusModel');
	}

	/**
	 * Document Status default function 
	 */
	public function index(): string
	{
		$data['internal_statuses'] = $data['client_statuses'] = array();
		$data['params'] = array('rows' => 20, 'pageno' => 1, 'sort_by' => 'created_at', 'sort_order' => 'desc', 'int_keywords' => '', 'cli_keywords' => "", 'cli_rows' => 20, 'cli_pageno' => 1, 'cli_sort_by' => 'created_at', 'cli_sort_order' => 'desc',);
		$data['params']['int_tRecords'] = $this->documentStatusModel->getInternalStatusCount($data['params']);
		$data['internal_statuses'] = $this->documentStatusModel->getInternalStatuses($data['params']);

		$data['params']['cli_tRecords'] = $this->documentStatusModel->getClientStatusCount($data['params']);
		$data['client_statuses'] = $this->documentStatusModel->getClientStatuses($data['params']);
		
		$data['page'] = array(
			'title' => 'Document Status',
			'page_title' => 'Document Status',
			'js' => ['documentStatus'],
			);

		return view('pims/document_status/document_status', $data);	 
	}

	/**
	 * Document Status body rendering function 
	 */
	public function documentStatusBody(): string
	{
		$data['internal_statuses'] = $data['client_statuses'] = array();
		$data['params'] = $this->request->getPost();
		$data['params']['int_tRecords'] = $this->documentStatusModel->getInternalStatusCount($data['params']);
		$data['internal_statuses'] = $this->documentStatusModel->getInternalStatuses($data['params']);

		$data['params']['cli_tRecords'] = $this->documentStatusModel->getClientStatusCount($data['params']);
		$data['client_statuses'] = $this->documentStatusModel->getClientStatuses($data['params']);

		return view('pims/document_status/document_status_body', $data);	 
	}

	/**
	 * Internal Status add function
	 */
	public function addIntDocumentStatus()
	{
		$data['type'] = $this->request->getPost('type');
		return view('pims/document_status/add_document_status', $data);
	}

	/**
	 * Internal Status insert function 
	 */
	public function createIntDocumentStatus(): string
	{
		if ($this->request->getPost(csrf_token()) == csrf_hash()) {
			$validation_rules = array(
				'code' => ['label' => 'Code', 'rules' => 'required|trim'],
				'name' => ['label' => 'Name', 'rules' => 'required|trim'],
			);

			if (!$this->validate($validation_rules)) {
				$data['params'] = $this->request->getPost();
				return view('pims/document_status/add_document_status', $data);
			}
			else {
				$internalStatusAr = array(
					'type' => $this->request->getPost('type'),
					'code' => $this->request->getPost('code'),
					'name' => $this->request->getPost('name'),
					'status' => 1,
					'created_by' => session('user')['id'], 
				);

				$insert_id = $this->documentStatusModel->insert($internalStatusAr);

				if ($insert_id) {
					return view('template/alert_modal', ['msg' => 'Document Status inserted Successfully']);
				}
				else {
					return view('template/alert_modal', ['msg' => 'error occures, try again !']);
				}

			}
		}
		else {
			return view('template/alert_modal', ['msg' => 'CSRF token mis-match, try again !']);
		}
	}

	/**
	 *  Edit the document status
	 */
	public function editDocumentStatus()
	{
		$data['id'] = $this->request->getPost('id');
		$data['document_status'] = $this->documentStatusModel->find($data['id']);

		return view('pims/document_status/edit_document_status', $data);
	}

	/**
	 * Update the document status 
	 */

	public function updateDocumentStatus()
	{
		if ($this->request->getPost(csrf_token()) == csrf_hash()) {
			$validation_rules = array(
				'code' => ['label' => 'Code', 'rules' => 'required|trim'],
				'name' => ['label' => 'Name', 'rules' => 'required|trim'],
			);

			if (!$this->validate($validation_rules)) {
				$data['params'] = $this->request->getPost();
				$data['id'] = $this->request->getPost('id');
				return view('pims/document_status/edit_document_status', $data);
			}
			else {
				$id = $this->request->getPost('id');
				$internalStatusAr = array(
					'code' => $this->request->getPost('code'),
					'name' => $this->request->getPost('name'),
					'status' => $this->request->getPost('status'),
					'updated_by' => session('user')['id'], 
				);

				$insert_id = $this->documentStatusModel->update($id,$internalStatusAr);

				if ($insert_id) {
					return view('template/alert_modal', ['msg' => 'Document Status updated Successfully']);
				}
				else {
					return view('template/alert_modal', ['msg' => 'error occures, try again !']);
				}

			}
		}
		else {
			return view('template/alert_modal', ['msg' => 'CSRF token mis-match, try again !']);
		}

	}
	public function deleteDocumentStatus() {
		$data['id'] = $this->request->getPost('id');

		$delete_id = $this->documentStatusModel->delete($data['id']);
		if ($delete_id) {
			$this->documentStatusModel->update($data['id'], ['deleted_by' => session('user')['id']]);
			return view('template/alert_modal', ['msg' => 'Document Status deleted Successfully']);
		}
		else {
			return view('template/alert_modal', ['msg' => 'error occures, try again !']);
		}
	}
}