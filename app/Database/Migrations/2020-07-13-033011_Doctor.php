<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Doctor extends Migration
{
	public function up(){
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'id_doctor' => [
				'type'           => 'VARCHAR',
				'constraint'     => 10,
			],
			'name' => [
				'type'           => 'VARCHAR',
				'constraint'     => 20,
			],
			'sex' => [
				'type'           => 'VARCHAR',
				'constraint'     => 10,
			],
			'date_of_birth' => [
				'type'           => 'DATE',
			],
			'email' => [
				'type'           => 'VARCHAR',
				'constraint'     => 50,
			],
			'phone' => [
				'type'           => 'VARCHAR',
				'constraint'     => 20,
			],
			'address' => [
				'type'          => 'TEXT',
				'null'     		=> TRUE
			],
			'id_specialist' => [
				'type'          => 'VARCHAR',
				'constraint'	=> 10,
			],
			'sunday' => [
				'type'          => 'VARCHAR',
				'constraint'	=> 15,
			],
			'monday' => [
				'type'          => 'VARCHAR',
				'constraint'	=> 15,
			],
			'tuesday' => [
				'type'          => 'VARCHAR',
				'constraint'	=> 15,
			],
			'wednesday' => [
				'type'          => 'VARCHAR',
				'constraint'	=> 15,
			],
			'thursday' => [
				'type'          => 'VARCHAR',
				'constraint'	=> 15,
			],
			'friday' => [
				'type'          => 'VARCHAR',
				'constraint'	=> 15,
			],
			'saturday' => [
				'type'          => 'VARCHAR',
				'constraint'	=> 15,
			],
			
	]);
	$this->forge->addKey('id', TRUE);
	$this->forge->addKey('id_specialist');
	$this->forge->createTable('doctor');
		
	}

	//--------------------------------------------------------------------

	public function down(){
		$this->forge->dropTable('doctor');
	}
}
