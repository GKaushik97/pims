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
}
