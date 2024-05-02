<?php

namespace App\Models\pims;

use CodeIgniter\Model;

/**
 * Document Revisions Model
 */
class DocumentRevisionsModel extends Model
{
	protected $table   		  		= 'document_revisions';
 	protected $primaryKey     		= 'id';

 	protected $useAutoIncrement     = true;

 	protected $returnType           = 'array';

 	protected $useSoftDeletes       = true;

 	protected $allowedFields        = array(
        'code',
        'name',
        'position',
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
     * To Get Postion
     */
    public function getMaxPosition(){
      $this->builder->select('max(position) as max_position');
      $poistion = $this->builder->get();
      return $poistion->getRowArray();
    }
}