<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tlog extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                     => [
                'type'               => 'INT',
                'constraint'         => 11,
                'auto_increment'     => true,
            ],
            'tanggal'                => [
                'type'               => 'DATE',
            ],
            'jam'              => [
                'type'               => 'TIME',
                'constraint'         => 255,
            ],
            'keterangan'             => [
                'type'               => 'VARCHAR',
                'constraint'         => 255,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tlog');
    }

    public function down()
    {
        $this->forge->dropTable('tlog');
    }
}
