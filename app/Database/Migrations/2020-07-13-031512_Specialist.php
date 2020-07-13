<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Specialist extends Migration
{
	public function up(){
		$this->forge->addField([
			'id'  => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'id_specialist'	=>[
				'type'			=> 'VARCHAR',
				'constraint'	=> 10,
			],
			'name' => [
				'type'           => 'VARCHAR',
				'constraint'     => 150,
			],
			'description' => [
				'type'           => 'TEXT',
				'null'           => TRUE,
			],
	]);
	$this->forge->addKey('id', TRUE);
	$this->forge->createTable('specialist');

	}

	//--------------------------------------------------------------------

	public function down(){
		$this->forge->dropTable('specialist');
	}
}
