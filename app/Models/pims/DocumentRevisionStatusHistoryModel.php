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
	);
	protected $useTimestamps = true;
	protected $dateFormat = 'datetime';
	protected $createdField = 'created_at';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';
}
