<?php
namespace App\Models\pims;

use CodeIgniter\Model;

/**
 * Document Revision Model
 */ 
class EdmsDocumentRevisionsModel extends Model
{
	protected $table = 'edms_document_revisions';
	protected $primaryKey = 'id';
	protected $useAutoIncrement = true;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $allowedFields = array(
		'edms_document_id',
		'document',
		'document_purpose_id',
		'document_revision_id',
		'version_number',
		'description',
		'verify_status',
		'approve_status',
		'created_by',
		'updated_by',
		'deleted_by', 
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
	 * To Get the Related Document Revision List
	 */ 
	public function getDocumentRevisionsList($id)
	{
		$this->builder = $this->db->table('edms_document_revisions edr');
		$this->builder->select('edr.*, u.name as user_name, u1.name as updated_name');
		$this->builder->join('user u', 'u.id = edr.created_by', 'LEFT');
		$this->builder->join('user u1', 'u1.id = edr.updated_by', 'LEFT');
		$this->builder->where('edr.edms_document_id', $id);
		$this->builder->where('edr.deleted_at', NULL);
		$this->builder->orderBy('edr.id', 'desc');
		return $this->builder->get()->getResultArray();
	}
	public function getDocumentRevisionsListNum($id)
	{
		$this->builder = $this->db->table('edms_document_revisions edr');
		$this->builder->select('count(*) as total_records');
		$this->builder->join('user u', 'u.id = edr.created_by', 'LEFT');
		$this->builder->join('user u1', 'u1.id = edr.updated_by', 'LEFT');
		$this->builder->where('edr.edms_document_id', $id);
		$this->builder->where('edr.deleted_at', NULL);
		$this->builder->orderBy('edr.id', 'desc');
		return $this->builder->get()->getRowArray();
	}
}
