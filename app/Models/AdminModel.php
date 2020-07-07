<?php namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model {
    protected $table = 'admin';

    protected $allowedFields = [
        'name',
        'username',
        'password'
    ];

    function __construct() {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
    }

    /**
     * Get admin credentials
     *
     * @param array $params
     * 0 => username
     * 1 => password
     * @return boolean
     */
    public function getAdminCredential($params) {

        $this->builder->select('username, password');
        $this->builder->where('username', $params[0]);
        $query = $this->builder->get()->getResultObject();

        if (!$query) {
            return FALSE;
        } else {
            $verify_pwd = password_verify($params[1], $query[0]->password);
            if ($verify_pwd) {
                return TRUE;
            }
        }

        return FALSE;
    }
}
