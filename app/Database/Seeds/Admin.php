<?php namespace App\Database\Seeds;

class Admin extends \CodeIgniter\Database\Seeder{
    public function run() {
        $data = [
            'name'     => 'Admin',
            'username' => 'admin',
            'password' => '$2y$10$OZQH9pNTEDD3wyiilNgJ..ziZDF04ASDTCVXJlb6Eec7gAEYVPSk2'
        ];

        // Using Query Builder
        $this->db->table('admin')->insert($data);
    }
}