<?php

namespace App\Models\pims;

use CodeIgniter\Model;

/**
 * Projects Model
 */
class ProjectsModel extends Model
{
	protected $table   		  		= 'projects';
 	protected $primaryKey     		= 'id';

 	protected $useAutoIncrement     = true;

 	protected $returnType           = 'array';

 	protected $useSoftDeletes       = true;

 	protected $allowedFields        = array(
        'name',
        'code',
        'client_id',
        'vendor_id',
        'pmc',
        'epc',
        'start_date',
        'end_date',
        'manager',
        'description',
        'created_by',
        'updated_by',
        'deleted_by',
    );

    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    /**
     * To Projects Vendors
     */
    public function getProjects($params)
    {
        $builder = $this->builder();
        $builder->select('projects.*, clients.name as client_name, vendors.name as vendor_name');
        $builder->join('clients', 'clients.id = projects.client_id', 'left');
        $builder->join('vendors', 'vendors.id = projects.vendor_id', 'left');
        $builder->where('projects.deleted_at', null);
        $this->queryProcess($params);
        $builder->orderBy($params['sort_by'], $params['sort_order']);
        $builder->limit($params['rows'], ($params['pageno'] - 1) * $params['rows']);
        $qry = $builder->get();
        return $qry->getResultArray();
    }



    /**
     * To Get Projects Count
     */
    public function getProjectsCount($params)
    {
        $builder = $this->builder();
        $builder->selectCount('projects.id', 'total_records');
        //$builder->join('clients', 'clients.id = projects.client_id');
        //$builder->join('vendors', 'vendors.id = projects.vendor_id');
        $builder->where('projects.deleted_at', null);
        $this->queryProcess($params);
        // Get count
        $count = $builder->get()->getRow()->total_records;

        return $count;
    }

    /**
     * To Apply Projects Filters
     */
    public function queryProcess($params)
    {
        $builder = $this->builder();
        if (isset($params['keywords']) && !empty($params['keywords'])) {
            $builder->groupStart();
            $builder->orLike('projects.name', $params['keywords']);
            $builder->orLike('projects.code', $params['keywords']);
            $builder->groupEnd();
        }
        
        if (isset($params['name']) && !empty($params['name'])) {
            $builder->like('projects.name', $params['name']);
        }
        if (isset($params['code']) && !empty($params['code'])) {
            $builder->like('projects.code', $params['code']);
        }
        if (isset($params['client_id']) && !empty($params['client_id'])) {
            $builder->like('projects.client_id', $params['client_id']);
        }
        if (isset($params['vendor_id']) && !empty($params['vendor_id'])) {
            $builder->like('projects.vendor_id', $params['vendor_id']);
        }
        if (isset($params['pmc']) && !empty($params['pmc'])) {
            $builder->like('projects.pmc', $params['pmc']);
        }
        if (isset($params['epc']) && !empty($params['epc'])) {
            $builder->like('projects.epc', $params['epc']);
        }
        if (isset($params['start_date']) && !empty($params['start_date'])) {
            $builder->like('projects.start_date', $params['start_date']);
        }
        if (isset($params['end_date']) && !empty($params['end_date'])) {
            $builder->like('projects.end_date', $params['end_date']);
        }
        if (isset($params['manager']) && !empty($params['manager'])) {
            $builder->like('projects.manager', $params['manager']);
        }
    }
}