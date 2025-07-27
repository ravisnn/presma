<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

class TableTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    /** @test */
    public function table_page_should_be_accessible_or_redirect()
    {
        // Akses halaman table tanpa session login
        $result = $this->get('/table');

        $this->assertTrue(
            $result->isOK() || $result->isRedirect(),
            'Halaman table tidak dapat diakses dan tidak melakukan redirect.'
        );
    }

    /** @test */
    public function table_admin_page_should_be_accessible_or_redirect()
    {
        // Akses halaman table_admin tanpa session login
        $result = $this->get('/table_admin');

        $this->assertTrue(
            $result->isOK() || $result->isRedirect(),
            'Halaman table_admin tidak dapat diakses dan tidak melakukan redirect.'
        );
    }
}
