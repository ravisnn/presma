<?php

namespace Tests\App\Controllers;

use CodeIgniter\Test\FeatureTestTrait;
use CodeIgniter\Test\CIUnitTestCase;

class DashboardTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    /** @test */
    public function dashboard_admin_redirects_if_not_logged_in()
    {
        $result = $this->get('/dashboard_admin');
        $result->assertRedirectTo('/login');
    }

    /** @test */
    public function dashboard_mahasiswa_redirects_if_not_logged_in()
    {
        $result = $this->get('/dashboard_mahasiswa');
        $result->assertRedirectTo('/login');
    }

    /** @test */
    public function cek_prestasi_requires_login()
    {
        $result = $this->get('/cek_prestasi');
        $result->assertRedirectTo('/login');
    }

    /** @test */
    public function report_requires_login()
    {
        $result = $this->get('/report');
        $result->assertRedirectTo('/login');
    }

    /** @test */
    public function form_page_can_be_accessed_without_login()
    {
        $result = $this->get('/form');
        $result->assertOK();
    }
}
