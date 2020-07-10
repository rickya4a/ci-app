<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Examination extends Migration
{
	public function up()
	{
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
	        'phone' => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
            'sex' => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
            ],
            'date_of_booking' => [
                'type'           => 'DATE'
            ],
            'time_booking' => [
                'type'           => 'TIME',
               
			],
			'id_specialist' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
               
			],
			'id_doctor' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
               
			],
			'status' => [
                'type'           => 'INT',
				'constraint'     => 11,
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
        $this->forge->addKey('username');
        $this->forge->addKey('id_specialist');
        $this->forge->addKey('id_doctor');
        $this->forge->createTable('examination');
	}

	//--------------------------------------------------------------------

	public function down() {
		$this->forge->dropTable('examination');
	}
}
