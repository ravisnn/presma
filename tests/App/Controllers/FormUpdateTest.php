<?php

namespace App\Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

class FormUpdateTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $refresh = true; // kosongkan DB tiap test
    protected $migrate = true; // jalankan migrasi
    protected $namespace = 'App'; // ambil migrasi dari App\Database\Migrations

    /** @test */
    public function it_updates_prestasi_successfully()
    {
        $prestasiModel = new \App\Models\PrestasiModel();

        // 1. Tambahkan data awal
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

        $id = $prestasiModel->insert($data);

        // 2. Update beberapa kolom
        $updatedData = [
            'nama' => 'Andi Update',
            'prestasi' => 'Juara 2',
            'gambar' => 'gambar_baru.jpg'
        ];

        $prestasiModel->update($id, $updatedData);

        // 3. Ambil data dan verifikasi
        $result = $prestasiModel->find($id);

        $this->assertEquals('Andi Update', $result['nama']);
        $this->assertEquals('Juara 2', $result['prestasi']);
        $this->assertEquals('gambar_baru.jpg', $result['gambar']);
    }
}
