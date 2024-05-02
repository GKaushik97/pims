<?php

namespace App\Models\pims;

use CodeIgniter\Model;
/**
 * Client Model
 */
class ClientModel extends Model
{
	
	protected $table      = 'clients';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name','code','created_by','updated_by','deleted_by'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    /**
     * To get clients
     */

    public function getClients($params)
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
     * To get count
     */
    
     
    public function getClientsCount($params)
    {
        
        $builder = $this->builder();
        $builder->selectCount('clients.id', 'total_records');
        $builder->where('clients.deleted_at', null);
        $this->queryProcess($params);
        // Get count
        $count = $builder->get()->getRow()->total_records;

        return $count;
    }

    /**
     * To get Client filters
     */

    public function queryProcess($params)
    {
        $builder = $this->builder();
        if (isset($params['keywords']) && !empty($params['keywords'])) {
            $builder->groupStart();
            $builder->orLike('clients.name', $params['keywords']);
            $builder->orLike('clients.code', $params['keywords']);
            $builder->groupEnd();
        }
    }
}