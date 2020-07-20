<?php namespace App\Models;

use CodeIgniter\Model;

class PemeriksaanModel extends Model
{
    protected $table = 'examination';

    protected $allowedFields = [
        'name',
        'email',
        'username',
        'password',
        'phone',
        'sex',
        'date_of_booking',
        'time_booking',
        'name_specialist',
        'name_doctor',
        'address',
        'status',
        'id_no'
    ];

    // Let there be the constructor
    public function __construct()
    {
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
    public function getUserCredential($params)
    {
        $this->builder->select('username, password');
        $this->builder->where('username', $params[0]);
        $query = $this->builder->get()->getResultObject();

        if (!$query) {
            return false;
        } else {
            $verify_pwd = password_verify($params[1], $query[0]->password);
            if ($verify_pwd) {
                return true;
            }
        }

        return false;
    }

    public function getUser($username)
    {
        $this->builder->select('username');
        $this->builder->where('username', $username);
        $query = $this->builder->get()->getRow();

        return ($query ? $query : false);
    }

    public function resetPassword($params)
    {
        $data = [
            'username' => $params[0],
            'password' => password_hash(
                $params[1],
                PASSWORD_BCRYPT
            ),
        ];
        $query = $this->builder->update($data);

        return ($query ? $query : false);
    }
}
