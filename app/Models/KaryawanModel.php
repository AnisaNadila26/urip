<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table            = 'karyawan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'tgl_lahir', 'gaji'];

    protected bool $allowEmptyInserts = false;

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    protected $allowCallbacks = true;
    protected $afterInsert    = ['logInsert'];
    protected $afterUpdate    = ['logUpdate'];
    protected $afterDelete    = ['logDelete'];

    protected function logInsert(array $data)
    {
        $db = \Config\Database::connect();
        $tlog = $db->table('tlog');
        $keterangan = "Insert into karyawan: " . $data['data']['nama'];
        $tlog->insert([
            'tanggal' => date('Y-m-d H:i:s'),
            'jam' => time('H:i:s'),
            'keterangan'  => $keterangan
        ]);

        return $data;
    }

    protected function logUpdate(array $data)
    {
        $db = \Config\Database::connect();
        $tlog = $db->table('tlog');
        $keterangan = "Update on karyawan: " . $data['data']['nama'];
        $tlog->insert([
            'tanggal' => date('Y-m-d H:i:s'),
            'jam' => time('H:i:s'),
            'keterangan'  => $keterangan
        ]);

        return $data;
    }

    protected function logDelete(array $data)
    {
        $db = \Config\Database::connect();
        $tlog = $db->table('tlog');
        $deletedData = $this->find($data['id']);
        $keterangan = "Delete from karyawan: " . $deletedData['nama'];
        $tlog->insert([
            'tanggal_jam' => date('Y-m-d H:i:s'),
            'jam' => time('H:i:s'),
            'keterangan'  => $keterangan
        ]);

        return $data;
    }
}
