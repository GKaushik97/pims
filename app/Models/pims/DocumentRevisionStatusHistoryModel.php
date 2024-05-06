<?php
namespace App\Models\pims;

use CodeIgniter\Model;

/**
 * Document Revision Status History Model
 */ 
class DocumentRevisionStatusHistoryModel extends Model
{
	protected $table = 'edms_document_revision_status_history';
	protected $primaryKey = 'id';
	protected $useAutoIncrement = true;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $allowedFields = array(
		'edms_document_revision_id',
		'document_status_id',
		'comments',
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
	 * Get Document Revision Status History
	 */ 
	public function getDocumentRevStatusHistory($id) {
		$this->builder = $this->db->table('edms_document_revision_status_history rsh');
		$this->builder->select('rsh.*, u.name as user_name, ds.name as doc_status, ds.code as doc_code');
		$this->builder->join('user u','u.id = rsh.created_by','LEFT');
		$this->builder->join('document_status ds','ds.id = rsh.document_status_id','LEFT');
		$this->builder->where('rsh.deleted_at', NULL);
		$this->builder->where('rsh.edms_document_revision_id', $id);
		$this->builder->orderBy('rsh.id', 'desc');
		return $this->builder->get()->getResultArray();
	}

	/**
	 * Get Document Status History List
	 */ 
	public function getDocHistoryStatusList()
	{
		$this->builder = $this->db->table('edms_document_revision_status_history rsh');
		$this->builder->select('rsh.*,u.name as username');
		$this->builder->join('user u', 'u.id = rsh.created_by', 'LEFT');
		$this->builder->where('rsh.deleted_at', NULL);
		$this->builder->orderBy('rsh.id', 'desc');
		return $this->builder->get()->getResultArray();
	}
}
