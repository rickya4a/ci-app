<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up() {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'username' => [
                'type'           => 'VARCHAR',
                'constraint'     => 25,
            ],
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'phone' => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
            'sex' => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
            ],
            'date_of_birth' => [
                'type'           => 'DATE'
            ],
            'place_of_birth' => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
            'religion' => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
            ],
            'status_meried'=>[
                'type'          => 'VARCHAR',
                'constraint'    => 15,
            ],
            'address' => [
                'type'           => 'TEXT',
                'null'           => TRUE
            ],
            'id_no' => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('users');
    }

    //--------------------------------------------------------------------

    public function down() {
        $this->forge->dropTable('users');
    }
}
