<?php

namespace App\Models;

use CodeIgniter\Model;

class PrestasiModel extends Model
{

    protected $table = 'prestasi';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nama', 'nim', 'prodi', 'kampus', 'prestasi', 'kegiatan', 'tahun', 'kategori', 'tingkat', 'judul', 'isi', 'gambar', 'nomor'];

    protected $useTimestamps = false;

    public function editData($id, $nama, $nim, $prodi, $kampus, $prestasi, $kegiatan, $tahun, $kategori, $tingkat, $judul, $isi, $gambar)
    {
        // Lakukan update data berdasarkan ID
        $data = [
            'nama' => $nama,
            'nim' => $nim,
            'prodi' => $prodi,
            'kampus' => $kampus,
            'prestasi' => $prestasi,
            'kegiatan' => $kegiatan,
            'tahun' => $tahun,
            'kategori' => $kategori,
            'tingkat' => $tingkat,
            'judul' => $judul,
            'isi' => $isi,
            'gambar' => $gambar,
        ];

        // Jalankan query update
        $result = $this->db->table($this->table)
            ->where('id', $id)
            ->update($data);

        return $result;
    }
    public function deletePrestasi($id)
    {
        return $this->delete($id);
    }
}

