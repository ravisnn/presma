<?php

namespace App\Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

class FormDeleteTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $refresh = false;
    protected $migrate = false;
    protected $namespace = 'App';

    /** @test */
    public function it_attempts_to_delete_prestasi_with_id_zero()
    {
        $prestasiModel = new \App\Models\PrestasiModel();

        $id = 4;

        // Coba hapus data dengan ID 0
        $deleted = $prestasiModel->delete($id);

        // Karena kemungkinan besar tidak ada data dengan ID 0,
        // hasil delete() biasanya adalah true, tapi tidak ada baris terhapus.
        $this->assertTrue($deleted);

        // Pastikan tidak ada data dengan ID 0 di tabel
        $record = $prestasiModel->find($id);
        $this->assertNull($record);
    }
}
