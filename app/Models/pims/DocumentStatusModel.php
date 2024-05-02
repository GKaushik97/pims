<?php
namespace App\Models\pims;

use CodeIgniter\Model;

/**
 * Locations Model
 */ 
class DocumentStatusModel extends Model
{
	protected $table = 'document_status';
	protected $primaryKey = 'id';
	protected $useAutoIncrement = true;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $allowedFields = array(
		'type','name','code','status','created_by','updated_by','deleted_by',
	);
	protected $useTimestamps = true;
	protected $dateFormat = 'datetime';
	protected $createdField = 'created_at';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';

	// Query Builder 
    protected $db;
    protected $builder;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        // Initiate database and query builder object
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
    }

    /**
     * Total Records count of Internal Statuses 
     */
	public function getInternalStatusCount($paramas)
	{
		$this->builder->select('*');
		if (isset($paramas['int_keywords']) and !empty($paramas['int_keywords'])) {
			$this->builder->like('code', $paramas['int_keywords']);
			$this->builder->orLike('name',$paramas['int_keywords']);
		}

		if (isset($paramas['status'])  and  $paramas['status'] != "") {
			$this->builder->where('status', $paramas['status']);
		}
		$this->builder->where('type',1);
		$this->builder->where('deleted_at', NULL);
		$qry = $this->builder->countAllResults();

		return $qry;
		
	}

	 /**
     * Records of Internal Statuses 
     */
	public function getInternalStatuses($paramas)
	{
		$this->builder->select('*');
		if (isset($paramas['int_keywords']) and !empty($paramas['int_keywords'])) {
			$this->builder->like('code', $paramas['int_keywords']);
			$this->builder->orLike('name',$paramas['int_keywords']);
		}

		if (isset($paramas['status'])  and  $paramas['status'] != "") {
			$this->builder->where('status', $paramas['status']);
		}

		$this->builder->where('type',1);
		$this->builder->where('deleted_at', NULL);
		$this->builder->orderBy($paramas['sort_by'], $paramas['sort_order']);
		$this->builder->limit($paramas['rows'], ($paramas['pageno'] - 1)*$paramas['rows']);
		$qry = $this->builder->get();

		return $qry->getResultArray();
	}

	 /**
     * Total Records count of Client Statuses 
     */
	public function getClientStatusCount($paramas)
	{
		$this->builder->select('*');
		if (isset($paramas['cli_keywords']) and !empty($paramas['cli_keywords'])) {
			$this->builder->like('code', $paramas['cli_keywords']);
			$this->builder->orLike('name',$paramas['cli_keywords']);
		}

		if (isset($paramas['status'])  and  $paramas['status'] != "") {
			$this->builder->where('status', $paramas['status']);
		}
		$this->builder->where('type',2);
		$this->builder->where('deleted_at', NULL);
		$qry = $this->builder->countAllResults();

		return $qry;
	}

	 /**
     * Records  of Client Statuses 
     */
	public function getClientStatuses($paramas)
	{
		$this->builder->select('*');
		if (isset($paramas['cli_keywords']) and !empty($paramas['cli_keywords'])) {
			$this->builder->like('code', $paramas['cli_keywords']);
			$this->builder->orLike('name',$paramas['cli_keywords']);
		}

		if (isset($paramas['status'])  and  $paramas['status'] != "") {
			$this->builder->where('status', $paramas['status']);
		}

		$this->builder->where('type',2);
		$this->builder->where('deleted_at', NULL);
		$this->builder->orderBy($paramas['cli_sort_by'], $paramas['cli_sort_order']);
		$this->builder->limit($paramas['cli_rows'], ($paramas['cli_pageno'] - 1)*$paramas['cli_rows']);
		$qry = $this->builder->get();

		return $qry->getResultArray();
	}
}
