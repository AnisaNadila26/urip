<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karyawan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                     => [
                'type'               => 'INT',
                'constraint'         => 11,
                'auto_increment'     => true,
            ],
            'nama'                   => [
                'type'               => 'VARCHAR',
                'constraint'         => 255,
            ],
            'tgl_lahir'              => [
                'type'               => 'VARCHAR',
                'constraint'         => 255,
            ],
            'gaji'                   => [
                'type'               => 'VARCHAR',
                'constraint'         => 255,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('karyawan');
    }

    public function down()
    {
        $this->forge->dropTable('karyawan');
    }
}
