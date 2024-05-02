<?php

namespace App\Models\pims;

use CodeIgniter\Model;

/**
 * Vendor Model
 */
class VendorModel extends Model
{
	protected $table   		  		= 'vendors';
 	protected $primaryKey     		= 'id';

 	protected $useAutoIncrement     = true;

 	protected $returnType           = 'array';

 	protected $useSoftDeletes       = true;

 	protected $allowedFields        = array(
        'name',
        'code',
        'contact_name',
        'contact_email',
        'contact_phone',
        'status',
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
     * To Get Vendors
     */
    public function getVendors($params)
    {
        $builder = $this->builder();
        $builder->select('*');
        $builder->where('deleted_at', null);
        $this->queryProcess($params);
        $builder->orderBy($params['sort_by'], $params['sort_order']);
        $builder->limit($params['rows'], ($params['pageno'] - 1) * $params['rows']);
        $qry = $builder->get();
        return $qry->getResultArray();
    }
    /**
     * To Get Vendors Count
     */
    public function getVendorsCount($params)
    {
        
        $builder = $this->builder();
        $builder->selectCount('vendors.id', 'total_records');
        $builder->where('vendors.deleted_at', null);
        $this->queryProcess($params);
        // Get count
        $count = $builder->get()->getRow()->total_records;

        return $count;
    }
    /**
     * To Apply Vendors Filters
     */
    public function queryProcess($params)
    {
        $builder = $this->builder();
        if (isset($params['keywords']) && !empty($params['keywords'])) {
            $builder->groupStart();
            $builder->orLike('vendors.name', $params['keywords']);
            $builder->orLike('vendors.code', $params['keywords']);
            $builder->orLike('vendors.contact_name', $params['keywords']);
            $builder->groupEnd();
        }
        
        if (isset($params['name']) && !empty($params['name'])) {
            $builder->like('name', $params['name']);
        }
        if (isset($params['contact_name']) && !empty($params['contact_name'])) {
            $builder->like('contact_name', $params['contact_name']);
        }
        if (isset($params['code']) && !empty($params['code'])) {
            $builder->like('code', $params['code']);
        }
        if (isset($params['contact_phone']) && !empty($params['contact_phone'])) {
            $builder->like('contact_phone', $params['contact_phone']);
        }
        if (isset($params['contact_email']) && !empty($params['contact_email'])) {
            $builder->like('contact_email', $params['contact_email']);
        }
        if (isset($params['status']) && $params['status'] != '') {
            $builder->where('status', $params['status']);
        }
    }
}