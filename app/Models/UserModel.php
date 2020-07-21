<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
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
        'religion',
        'status_meried',
        'id_no'
    ];

    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
    }

    /**
     * Get all users
     *
     * @return object
     */
    public function getUsers()
    {
        return $this->builder->select('*')
                             ->get()
                             ->getResultObject();
    }

    /**
     * Get user credentials
     *
     * @param array $params
     * 0 => username
     * 1 => password
     * @return boolean
     */
    public function getUserCredential(array $params)
    {
        $this->builder->select('username, password');
        $this->builder->where('username', $params[0]);
        $query = $this->builder->get()->getFirstRow();

        if ($query) return password_verify($params[1], $query->password);

        return false;
    }

    /**
     * Get user data
     *
     * @param string $username
     * @return object|boolean
     */
    public function getUser(string $username)
    {
        $this->builder->select('username');
        $this->builder->where('username', $username);
        $query = $this->builder->get()->getRow();

        return ($query ? $query : false);
    }

    /**
     * Save new password
     *
     * @param array $params
     * @return boolean
     */
    public function resetPassword(array $params)
    {
        $data = [
            'username' => $params[0],
            'password' => password_hash(
                $params[1],
                PASSWORD_BCRYPT
            ),
        ];
        $query = $this->builder->update($data);

        return ($query ? true : false);
    }
}