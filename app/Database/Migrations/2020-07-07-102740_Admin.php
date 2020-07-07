<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
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
            'username' => [
                'type'           => 'VARCHAR',
                'constraint'     => 25,
            ],
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ]
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('admin');
	}

	//--------------------------------------------------------------------

	public function down() {
		$this->forge->dropTable('admin');
	}
}
