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
        'religion',
        'status_meried',
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
    public function getUserCredential($params) {

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

    public function getUser($username) {

        $this->builder->select('username');
        $this->builder->where('username', $username);
        $query = $this->builder->get()->getRow();

        if (!$query) {
            return FALSE;
        }

        return $query;
    }

    public function resetPassword($params) {
        $data = [
            'username' => $params[0],
            'password' => password_hash(
                $params[1],
                PASSWORD_BCRYPT
            ),
        ];
        $query = $this->builder->update($data);

        if ($query) {
            return TRUE;
        }

        return FALSE;
    }
}