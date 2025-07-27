<?php

namespace App\Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

class FormCreateTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $refresh = true; // kosongkan DB tiap test
    protected $migrate = true; // jalankan migrasi
    protected $namespace = 'App'; // ambil migrasi dari App\Database\Migrations

    /** @test */
    public function it_inserts_prestasi_successfully()
    {
        $prestasiModel = new \App\Models\PrestasiModel();

        $data = [
            'nama' => 'Andi',
            'nim' => '22334455',
            'prodi' => 'TI',
            'kampus' => 'Kampus A',
            'prestasi' => 'Juara 1',
            'kegiatan' => 'Lomba Coding',
            'tahun' => '2025',
            'kategori' => 'Akademik',
            'tingkat' => 'Nasional',
            'judul' => 'Prestasi Andi',
            'isi' => 'Detail prestasi Andi',
            'gambar' => 'gambar.jpg',
            'nomor' => 1,
        ];

        $insertID = $prestasiModel->insert($data);
        $this->assertIsInt($insertID);
    }
}
