<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class News extends Migration
{
	public function up() {
		$this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'title' => [
                'type'           => 'VARCHAR',
                'constraint'     => 128
            ],
            'body' => [
                'type'           => 'TEXT'
            ],
            'img_path' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255
            ],
            'slug' => [
                'type'           => 'VARCHAR',
                'constraint'     => 128
            ],
            'updated' => [
                'type'           => 'TIMESTAMP'
            ]
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->addKey('slug');
        $this->forge->createTable('news');
	}

	//--------------------------------------------------------------------

	public function down() {
		$this->forge->dropTable('news');
	}
}
