<?php

namespace App\Models\pims;

use CodeIgniter\Model;

/**
 * Document Purposes Model
 */
class DocumentPurposesModel extends Model 
{
	protected $table      = 'document_purposes';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name','code','status','created_by','updated_by','deleted_by'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

/**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        // Initiate database and query builder object
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('document_purposes');
    }

    /**
     * Retrieve all documents with optional filtering 
     */
    public function getAllDocuments($params)
    {
        $this->builder->select('*');

        if (!empty($params['keywords'])) {
            $this->builder->groupStart()
                ->like('name', $params['keywords'])
                ->orLike('code', $params['keywords'])
                ->groupEnd();
        }

        if (isset($params['status']) AND $params['status'] !== "") {
            $this->builder->where('status', $params['status']);
        }
        $this->builder->where('deleted_at',NULL);
        $this->builder->orderBy($params['sort_by'], $params['sort_order']);
        $query = $this->builder->get();

        return $query->getResultArray();
    }

    /**
     * Count all documents with optional filtering
     */
    public function countAllDocuments($params)
    {
        $this->builder->select('COUNT(*) as tRecords');

        if (!empty($params['keywords'])) {
            $this->builder->like('name', $params['keywords']);
        }

        if (isset($params['status']) AND $params['status'] !== "") {
            $this->builder->where('status', $params['status']);
        }

        $this->builder->where('deleted_at',NULL);
        $result = $this->builder->get();
        return $result->getResultArray()[0]['tRecords'];
    }
}