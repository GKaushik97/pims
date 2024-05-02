<?php

namespace App\Controllers\pims;

use App\Controllers\BaseController;

/**
 *  Client Controller
 */
class Client extends BaseController
{
	private $clientModel;
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->clientModel = model('App\Models\pims\ClientModel');
		
	}

	/**
	 * Default function
	 */
	public function index(): string
	{
		$data['params'] = [
			'rows' => "20",
			'pageno' => "1",
			'sort_by' => "code",
			'sort_order' => "asc",
			'keywords' => "",
		];
		$data['clients'] = $this->clientModel->getClients($data['params']);
		$data['tRecords'] = $this->clientModel->getClientsCount($data['params']);

		$data['page'] = array(
			'title' => 'Client Module',
			'page_title' => 'Client Module',
			'breadcrumb' => [["name" => "PIMS","url" => "pims"]],
			'js' => ['client'],
		);
		return view('pims/client/client',$data);
	}

	/**
	 * Client Body Function
	 */
	public function clientBody() : string
	{
		$data['params'] = $this->request->getPost();
		$data['tRecords'] = $this->clientModel->getClientsCount($data['params']);
		$data['clients'] = $this->clientModel->getClients($data['params']);
		return view('pims/client/client_body', $data);
	}

	/**
	 * Add new client
	 */
	public function add(): string 
	{
		return view('pims/client/add_client');
	}

	/**
	 * Insert new client
	 */
	public function create(): string 
	{
		if ($this->request->getPost(csrf_token()) == csrf_hash()) {
			$rules = array(
				'name' => ['label' => 'Name','rules' => 'required'],
			);

			if ($this->validate($rules)) {
				$create_c = array(
					'name' => $this->request->getPost('name'),
					'created_by' => session('user')['id'],

				);

				$this->clientModel->insert($create_c);
				$add_c = $this->clientModel->insertID();

				$code = "C" . str_pad($add_c, 4, '0', STR_PAD_LEFT);
				$client_code = array(
					'id' => $add_c,
					'code' => $code,
				);

				$this->clientModel->update($add_c,$client_code);
				return view('template/alert_modal',['msg' => "client added successfully!",]);

			} else {
				return view("pims/client/add_client");
			}
		}
	}

	/**
	 * edit client
	 */

	public function edit(): string 
	{
		$id = $this->request->getGet('id');
		$data['clients'] = $this->clientModel->find($id);
		return view('pims/client/edit_client',$data);

	}

	/**
	 * update client
	 */

	public function update(): string 
	{
		if ($this->request->getPost(csrf_token()) == csrf_hash()) {
			$id = $this->request->getPost('id');
			$rules = array(
				'name' => ['label' => 'Name','rules' => 'required'],
			);
			if ($this->validate($rules)) {
				$update_client = array(
					'name' => $this->request->getPost('name'),
					'updated_by' => session('user')['id'],
				);
				$this->clientModel->update($id,$update_client);
				return view('template/alert_modal',['msg' => 'client updated successfully!']);

			} else {

				return view('pims/client/edit_client');
			}

		}
	}

	/**
	 * delete client
	 */

	public function delete(): string 
	{
		$id = $this->request->getPost('id');
		$deleted_by = session('user')['id'];
		if ($this->clientModel->delete($id)) {
			$this->clientModel->update($id,['deleted_by' => $deleted_by]);
			return view('template/alert_modal',['msg' => 'client deleted successfully!']);
		}
	}

	
}