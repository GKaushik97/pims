<?php
namespace App\Models\pims;

use CodeIgniter\Model;

/**
 * Locations Model
 */ 
class EDMSDocumentsModel extends Model
{
	protected $table = 'edms_documents';
	protected $primaryKey = 'id';
	protected $useAutoIncrement = true;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $allowedFields = array(
		'code',
		'document',
		'description',
		'project_id',
		'origin',
		'discipline_id',
		'document_type_id',
		'document_purpose_id',
		'document_revision_id',
		'version_number',
		'est_start_date',
		'est_end_date',
		'start_date',
		'end_date',
		'document_status_id',
		'verify_status',
		'approve_status',
		'created_by',
		'updated_by',
		'edms_document_revision_id'
	);
	protected $useTimestamps = true;
	protected $dateFormat = 'datetime';
	protected $createdField = 'created_at';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';
	protected $db;
	protected $builder;
	public function __construct() 
	{
		parent::__construct();
        $this->db = \Config\Database::connect();
	}
	/**
	 * To Get List of Documents
	 */ 
	public function getEdmsDocumentList($params) {
		$this->builder = $this->db->table('edms_documents ed');
		$this->builder->select('ed.id,ed.code,ed.est_start_date,ed.est_end_date,ed.start_date,ed.end_date,ed.origin,ed.created_at,ed.created_by,p.name as project_name,d.name as discipline_name,dr.name as doc_revision,dp.name as doc_purpose,edr.version_number,dt.name as doc_type,ed.verify_status,ed.approve_status,ds.code as status_code,ds.name as status_name,ds1.code as approve_code,ds1.name as approve_name');
		$this->getDocumentQryProcess($params);
		$this->builder->where('ed.deleted_at', NULL);
		$this->builder->orderBy($params['sort_by'], $params['sort_order']);
		$this->builder->limit($params['rows'], ($params['page_no']-1)*$params['rows']);
		return $this->builder->get()->getResultArray();
	}
	/**
	 * To Count the List of Documents
	 */ 
	public function getEdmsDocumentListNum($params) {
		$this->builder = $this->db->table('edms_documents ed');
		$this->builder->select('count(*) as trecords');
		$this->getDocumentQryProcess($params);
		$this->builder->where('ed.deleted_at', NULL);
		return $this->builder->get()->getRowArray();
	}
	/**
	 * Document Query Process
	 */ 
	public function getDocumentQryProcess($params) {
		$this->builder->join('projects p', 'p.id = ed.project_id', 'LEFT');
		$this->builder->join('edms_document_revisions edr', 'edr.id = ed.edms_document_revision_id', 'LEFT');
		$this->builder->join('disciplines d', 'd.id = ed.discipline_id', 'LEFT');
		$this->builder->join('document_types dt', 'dt.id = ed.document_type_id', 'LEFT');
		$this->builder->join('document_revisions dr', 'dr.id = edr.document_revision_id', 'LEFT');
		$this->builder->join('document_purposes dp', 'dp.id = edr.document_purpose_id', 'LEFT');
		$this->builder->join('document_status ds', 'ds.id = ed.verify_status', 'LEFT');
		$this->builder->join('document_status ds1', 'ds1.id = ed.approve_status', 'LEFT');
		if(isset($params['keywords']) and !empty($params['keywords'])) {
			$this->builder->like('ed.code', $params['keywords']);
			$this->builder->orLike('edr.version_number', $params['keywords']);
		}
	}

	/**
	 * To get the Project Discipline Count
	 */ 
	public function getProjectDisciplineNum($params) {
		return $this->db->table('project_document_count')->select('count')->where(['project_id' => $params['project_id'],'discipline_id' => $params['discipline_id']])->get()->getResultArray();
	}
	/**
	 * Manage Project/Discipline Insert/Edit
	 */ 
	public function manageProjectDiscipline($params) {
		$count = 0;
		$qry = $this->db->table('project_document_count')->select('count')->where(['project_id' => $params['project_id'],'discipline_id' => $params['discipline_id']])->get()->getResultArray();
		if(count($qry) > 0) {
			foreach ($qry as $q_k1 => $q_val) {
				$count_ext = $q_val['count'] +1;
			}
			$count_val = array('count'=>$count_ext);
			return $this->db->table('project_document_count')->where(['project_id' => $params['project_id'], 'discipline_id' => $params['discipline_id']])->set($count_val)->update();
		} else {
			$add_count_data = array(
				'project_id' => $params['project_id'],
				'discipline_id' => $params['discipline_id'],
				'count' => 1,
			);
			return $this->db->table('project_document_count')->insert($add_count_data);
		}
	}

	/**
	 * EDMS Document ID update 
	 */ 
	public function updateEdmsDocument($id, $data) {
		$this->builder = $this->db->table('edms_documents ed');
		return $this->builder->where('id', $id)->set($data)->update();
	}

	/**
	 * Get the Document ID
	 */ 
	public function getEdmsDocumentByID($id) {
		$this->builder = $this->db->table('edms_document_revisions edr');
		$this->builder->select('ed.id,edr.id as revision_id,edr.document,ed.code,ed.est_start_date,ed.est_end_date,ed.start_date,ed.end_date,ed.origin,edr.version_number,edr.created_at,p.name as project_name,d.name as discipline_name,dr.name as doc_revision,dp.name as doc_purpose,dt.name as doc_type,ed.verify_status,ed.approve_status,u.name as username,u1.name as update_name,ds.code as verify_code,ds.name as verify_name,ds1.code as approved_code,ds1.name as approved_name,edr.updated_at');
		$this->builder->join('edms_documents ed', 'ed.edms_document_revision_id = edr.id', 'LEFT');
		$this->builder->join('projects p', 'p.id = ed.project_id', 'LEFT');
		$this->builder->join('disciplines d', 'd.id = ed.discipline_id', 'LEFT');
		$this->builder->join('document_types dt', 'dt.id = ed.document_type_id', 'LEFT');
		$this->builder->join('document_revisions dr', 'dr.id = edr.document_revision_id', 'LEFT');
		$this->builder->join('document_purposes dp', 'dp.id = edr.document_purpose_id', 'LEFT');
		$this->builder->join('document_status ds', 'ds.id = ed.verify_status', 'LEFT');
		$this->builder->join('document_status ds1', 'ds1.id = ed.approve_status', 'LEFT');
		$this->builder->join('user u', 'u.id = ed.created_by', 'LEFT');
		$this->builder->join('user u1', 'u1.id = ed.updated_by', 'LEFT');
		$this->builder->where('edr.edms_document_id', $id);
		$this->builder->where('ed.deleted_at', NULL);
		$this->builder->orderBy('edr.id','desc');
		$this->builder->limit(1,0);
		return $this->builder->get()->getRowArray();
	} 
}
