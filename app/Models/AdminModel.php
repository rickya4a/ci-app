<?php namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';

    protected $allowedFields = [
        'name',
        'username',
        'password'
    ];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
    }

    /**
     * Get admin credentials
     *
     * @param array $params
     * 0 => username
     * 1 => password
     * @return boolean|object
     */
    public function getAdminCredential(array $params)
    {
        $this->builder->select('username, name, password');
        $this->builder->where('username', $params[0]);
        $query = $this->builder->get()->getFirstRow();

        if (!$query) {
            return false;
        } else {
            $verify_pwd = password_verify($params[1], $query->password);
            if ($verify_pwd) {
                return $query;
            }
        }

        return false;
    }

    /**
     * Get admin data
     *
     * @param string $username
     * @return object
     */
    public function getAdminData(string $username)
    {
        $this->builder->select();
        $this->builder->where('username', $username);
        $query = $this->builder->get()->getFirstRow();

        if ($query) return $query;
    }

    /**
     * Update data
     *
     * @param array $data
     * @return null|object
     */
    public function updateAdmin(array $data)
    {
        $current_username = session('username');

        $this->builder->where('username', $current_username);
        $query = $this->builder->update($data);

        if ($query) {
            $this->builder->select();
            $this->builder->where('username', $data['username']);
            $new_data = $this->builder->get()->getFirstRow();
            return $new_data;
        }

        return null;
    }
}
