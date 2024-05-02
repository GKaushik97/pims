<?php

namespace App\Controllers\InvoiceTracking;

use App\Controllers\BaseController;


/**
 * Project controller
 */
class Project extends BaseController
{
    private $projectModel;
    private $locationModel;
    private $clientModel;
    protected $fileTypeModel;
    protected $projectFileModel;

    public function __construct()
    {
        $this->projectModel = model('App\Models\InvoiceTracking\ProjectModel');
        $this->locationModel = model('App\Models\InvoiceTracking\LocationModel');
        $this->clientModel = model('App\Models\InvoiceTracking\ClientModel');
        $this->fileTypeModel = model('App\Models\InvoiceTracking\FileTypeModel');
        $this->projectFileModel = model('App\Models\InvoiceTracking\ProjectFileModel');
    }

    /**
     * Projects Data List
     */
    public function index(): string
    {
        $data['locations'] = $this->locationModel->find();
        $data['currencies'] = $this->projectModel->getCurrencies();
        $data['clients'] = $this->clientModel->find();
        $data['params'] = array(
            'rows' => 10,
            'pageno' => 1,
            'sortby' => 'code',
            'sort_order' => 'asc',
            'keywords' => '',
        );
        $data['total_records'] = $this->projectModel->getAllProjectsNum($data['params']);
        $data['projects'] = $this->projectModel->getAllProjects($data['params']);
        // Set template parameters
        $data['page'] = array(
            'title' => 'Projects',
            'page_title' => 'Projects',
            'js' => ['project', 'freeze-table'],
        );
        return view('invoice_tracking/project/projects', $data);
    }

    /**
     * Projects Body Page 
     */ 
    public function indexBody()
    {
        $data['params'] = $this->request->getPost();
        $data['locations'] = $this->locationModel->find();
        $data['clients'] = $this->clientModel->find();
        $data['currencies'] = $this->projectModel->getCurrencies();
        $data['total_records'] = $this->projectModel->getAllProjectsNum($data['params']);
        $data['projects'] = $this->projectModel->getAllProjects($data['params']);
        return view('invoice_tracking/project/projects_body', $data);
    }

    /**
     * Add project
     */
    public function add() : string
    {
        $data['currencies'] = $this->projectModel->getCurrencies();
        $data['locations'] = $this->locationModel->find();
        $data['clients'] = $this->clientModel->find();
        return view('invoice_tracking/project/project_add',$data);
    }

    /**
     * Create project
     */
    public function create() : string
    {
        if($this->request->getPost(csrf_token()) === csrf_hash()) 
        {
            $rules = array(
                'code' => ['label' => 'Code', 'rules' => 'required|is_unique[project.code]'],
                'name' => ['label' => 'Name', 'rules' => 'required'],
                'type' => ['label' => 'Short Name', 'rules' => 'required'],
                'pm_c' => ['label' => 'Project Mngt. cslt.', 'rules' => 'required'],
                'de_c' => ['label' => 'Design Engineer Cslt.', 'rules' => 'required'],
                'noa' => ['label' => 'Notification of Award', 'rules' => 'required'],
                'completion_date' => ['label' => 'Completion Date', 'rules' => 'required'],
                'extension_date' => ['label' => 'Extension Date', 'rules' => 'required'],
                'contract_value_inr' => ['label' => 'Contract Value INR', 'rules' => 'required|numeric'],
                'contract_value' => ['label' => 'Contract Value', 'rules' => 'required|numeric'],
                'currency' => ['label' => 'Currency', 'rules' => 'required'],
                'ex_rate' => ['label' => 'Exchange Value', 'rules' => 'required|numeric'],
                'location' => ['label' => 'Location', 'rules' =>'required'],
                'client' => ['label' => 'Client', 'rules' =>'required'],
            );
            $check = $this->validate($rules);
            if($check == TRUE) {
                $add_project = array(
                    'code' => $this->request->getPost('code'),
                    'name' => $this->request->getPost('name'),
                    'type' => $this->request->getPost('type'),
                    'location' => $this->request->getPost('location'),
                    'client' => $this->request->getPost('client'),
                    'pm_c' => $this->request->getPost('pm_c'),
                    'de_c' => $this->request->getPost('de_c'),
                    'noa' => date('Y-m-d', strtotime($this->request->getPost('noa'))),
                    'completion_date' => date('Y-m-d', strtotime($this->request->getPost('completion_date'))),
                    'extension_date' => date('Y-m-d', strtotime($this->request->getPost('extension_date'))),
                    'contract_value_inr' => $this->request->getPost('contract_value_inr'),
                    'contract_value' => $this->request->getPost('contract_value'),
                    'currency' => $this->request->getPost('currency'),
                    'ex_rate' => $this->request->getPost('ex_rate'),
                    'note' => $this->request->getPost('note') ? $this->request->getPost('note') : '',
                    'created_at' => date('Y-m-d H:i'),
                    'created_by' => $this->session->get('user')['id'],
                );
                $create_project = $this->projectModel->insert($add_project);
                if($create_project) {
                    $alert = array('color' => 'success', 'msg' => "Inserted SuccessFully");
                }
                else {
                    $alert = array('color' => 'danger', 'msg' => "Error in Inserting");
                }
            } 
            else {
                $data['locations'] = $this->locationModel->find();
                $data['clients'] = $this->clientModel->find();
                $data['currencies'] = $this->projectModel->getCurrencies();
                return view('invoice_tracking/project/project_add', $data);
            }
        }
        else {
            $alert = array('color' => 'danger', 'msg' => "Error in Inserting!!Please Try Again");
        }
        return view('template/alert_modal', $alert);
    }

    /**
     * Edit project
     */
    public function edit($id = 0) : string
    {
        $data['project_details'] = $this->projectModel->find($id);
        $data['locations'] = $this->locationModel->find();
        $data['clients'] = $this->clientModel->find();
        $data['currencies'] = $this->projectModel->getCurrencies();
        return view('invoice_tracking/project/project_edit',$data);
    }

    /**
     * Update project
     */
    public function update() : string
    {
        if($this->request->getPost(csrf_token()) === csrf_hash())
        {
            $id=$this->request->getPost('id');
            $rules = array(
                'code' => ['label' => 'Code', 'rules' => 'required|is_unique[project.code,id,'.$this->request->getPost('id').']'],
                'name' => ['label' => 'Name', 'rules' => 'required'],
                'type' => ['label' => 'Short Name', 'rules' => 'required'],
                'pm_c' => ['label' => 'Project Mngt. cslt.', 'rules' => 'required'],
                'de_c' => ['label' => 'Design Engineer Cslt.', 'rules' => 'required'],
                'noa' => ['label'=> 'Notification of Award', 'rules' => 'required'],
                'completion_date' => ['label'=> 'Completion Date', 'rules' => 'required'],
                'extension_date' => ['label'=> 'Extension Date', 'rules' => 'required'],
                'contract_value_inr' => ['label'=> 'Contract Value', 'rules' => 'required|numeric'],
                'contract_value' => ['label'=> 'Contract Value', 'rules' => 'required|numeric'],
                'currency' => ['label'=> 'Currency', 'rules' => 'required'],
                'ex_rate' => ['label'=> 'Exchange Value', 'rules' => 'required|numeric'],
                'location' => ['label'=> 'Location', 'rules'=>'required'],
                'client' => ['label'=> 'Client', 'rules'=>'required'],
            );
            $check = $this->validate($rules);
            if($check == TRUE) 
            {
                $edit_project = array(
                    'code' => $this->request->getPost('code'),
                    'name' => $this->request->getPost('name'),
                    'type' => $this->request->getPost('type'),
                    'location' => $this->request->getPost('location'),
                    'client' => $this->request->getPost('client'),
                    'pm_c' => $this->request->getPost('pm_c'),
                    'de_c' => $this->request->getPost('de_c'),
                    'noa' => date('Y-m-d',strtotime($this->request->getPost('noa'))),
                    'completion_date' => date('Y-m-d',strtotime($this->request->getPost('completion_date'))),
                    'extension_date' => date('Y-m-d',strtotime($this->request->getPost('extension_date'))),
                    'contract_value_inr' => $this->request->getPost('contract_value_inr'),
                    'contract_value' => $this->request->getPost('contract_value'),
                    'currency' => $this->request->getPost('currency'),
                    'ex_rate' => $this->request->getPost('ex_rate'),
                    'note' => $this->request->getPost('note'),
                    'updated_at' => date('Y-m-d H:i'),
                    'updated_by' => $this->session->get('user')['id'],
                );
                $update_project = $this->projectModel->update($id,$edit_project);
                if($update_project) {
                    $alert = array('color' => 'success', 'msg' => "Updated SuccessFully");
                }else {
                    $alert = array('color' => 'danger', 'msg' => "Error in Updating");
                }
            }
            else
            {
                $data['locations'] = $this->locationModel->find();
                $data['clients'] = $this->clientModel->find();
                $data['currencies'] = $this->projectModel->getCurrencies();
                return view('invoice_tracking/project/project_edit',$data);
            }
        }
        else 
        {
            $alert = array('color' => 'danger', 'msg' => "Error in Updating!Please Try Again");
        }
        return view('template/alert_modal', $alert);
    }

    /**
     * View Project
     */ 
    public function view() : string
    {
        $id=$this->request->getGet('id');
        $locations = $this->locationModel->find();
        foreach ($locations as $key => $value) {
            $data['locations_val'][$value['id']] = $value;
        }
        $clients = $this->clientModel->find();
        foreach($clients as $key1 => $value2) {
            $data['clients_val'][$value2['id']] = $value2;
        }
        $data['file_types'] = $this->fileTypeModel->find();
        $data['project_files'] = $this->projectFileModel->where(['project_id' => $id])->where('deleted_at',NULL)->find();
        $data['project_info'] = $this->projectModel->find($id);
        $data['currencies'] = $this->projectModel->getCurrencies();
        return view('invoice_tracking/project/project_view', $data);
    }

    /**
     * To Upload File Details
     */ 
    public function addProjectFile()
    {
        $id = $this->request->getPost('project_id');
        $file_upload_msg = '';
        $rules = array(
            'file_type' => ['label' => 'File Type', 'rules' => 'required'],
            'file' =>[
                'rules'=>['uploaded[file]', 'ext_in[file,pdf,docx,doc,png,jpg]', 'max_size[file,20480]'],
            ],
        );
        $check = $this->validate($rules);
        if($check == TRUE) {
            $file_upload = $this->request->getFile('file');
            if($file_upload->isValid()) {
                $fileName = $file_upload->getRandomName();
                $file_upload->move(DOCUMENTROOT . "files/project/", $fileName);
            }
            $file_insert = array(
                'project_id' => $id,
                'file_type' => $this->request->getPost('file_type'),
                'file' => $fileName
            );
            if($this->projectFileModel->insert($file_insert)) {
                $file_upload_msg = alert_success('File uploaded successfully!');
            }
            else {
                $file_upload_msg = alert_danger('Error in uploading file!');
            }
        }
        else {
            $data['file_show_error'] = 1;
        }
        $data['file_types'] = $this->fileTypeModel->find();
        $data['project_files'] = $this->projectFileModel->where(['project_id' => $id])->find();
        return $file_upload_msg . view('invoice_tracking/project/project_view_file', $data);
    }


    /**
     * Delete project
     */
    public function delete() : string
    {
        $id = $this->request->getPost('id');
        $project_files = $this->projectFileModel->where(['project_id' => $id])->find();
        foreach($project_files as $p_key => $p_file)
        {
            $pro_file = DOCUMENTROOT."files/project/".$p_file['file'];
            if(file_exists($pro_file) and !is_dir($pro_file)){
                unlink($pro_file);
            }
        }
        $this->projectFileModel->where(['project_id' => $id])->delete();
        // Delete files
        if($this->projectModel->delete(['id' => $id])) {
            $alert = array('color' => 'success', 'msg' => "Project Deleted SuccessFully");  
        }
        else {
            $alert = array('color' => 'danger', 'msg' => "Error in Deleting");            
        }
        return view('template/alert_modal', $alert);
    }

    /**
     * Delete Project File
     */ 
    public function deleteProjectFile() 
    {
        $id = $this->request->getPost('id');
        $data['file_types'] = $this->fileTypeModel->find();
        $old_project_file = $this->projectFileModel->find($id);
        $old_file = DOCUMENTROOT.'files/project/' . $old_project_file['file'];
        // Check file exists or not
        if(file_exists($old_file) and !is_dir($old_file)) {
            unlink($old_file);
        }
        $this->projectFileModel->delete(['id' => $id]);
    }
}
