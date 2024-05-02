<?

namespace App\Models\pims;

use CodeIgniter\Model;  

class DisciplineModel extends Model 
{
    protected $table = 'disciplines';
    protected $primaryKey = 'id';
    protected $useAutoIncrement    = true;
    protected $returnType          = 'array';
    protected $useSoftDeletes      = true;
    protected $allowedFields = array(
        'code',
        'name',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'

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
        $this->builder = $this->db->table('disciplines');
    }

    /**
     * Retrieve all disciplines with optional filtering and pagination
     */
    public function getAllDisciplines($params)
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
     * Count all disciplines with optional filtering
     */
    public function countAllDisciplines($params)
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
