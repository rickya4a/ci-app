<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'users';

    protected $allowedFields = [
        'name',
        'email',
        'username',
        'password',
        'phone',
        'sex',
        'date_of_birth',
        'place_of_birth',
        'address',
        'id_no'
    ];

    // Let there be the constructor
    function __construct() {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
    }

    /**
     * Get user credentials
     *
     * @param array $params
     * 0 => username
     * 1 => password
     * @return boolean
     */
    public function getUser($params) {

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