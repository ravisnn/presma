<?php

namespace App\Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

class IndexTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    /** @test */
    public function index_page_should_load()
    {
        $result = $this->get('/index');
        $result->assertStatus(200);
        $result->assertSee('index'); // Pastikan view memuat kata "index"
    }

    /** @test */
    public function prestasi_page_should_load_without_keyword()
    {
        $result = $this->get('/prestasi');
        $result->assertStatus(200);
        $result->assertSee('prestasi'); // Pastikan view memuat kata "prestasi"
    }

    /** @test */
    public function prestasi_page_should_filter_with_keyword()
    {
        $result = $this->get('/prestasi?keyword=Andi');
        $result->assertStatus(200);
        $result->assertSee('prestasi');
    }

    /** @test */
    public function login_should_fail_with_invalid_credentials()
    {
        $postData = [
            'user' => 'salahuser',
            'password' => 'passwordsalah'
        ];

        $result = $this->post('/login_action', $postData);
        $result->assertRedirect(); // Redirect ke login lagi
        $result->assertSessionHas('error', 'Invalid username or password.');
    }

    /** @test */
    public function login_should_success_with_valid_credentials()
    {
        // Sebelum test ini, tambahkan user test di database:
        // username: testadmin, password: 123456 (hash di database)
        $postData = [
            'user' => 'testadmin',
            'password' => '123456'
        ];

        $result = $this->post('/login_action', $postData);
        $result->assertRedirectTo('/dashboard_admin');
        $this->assertTrue(session()->get('logged_in'));
    }

    /** @test */
    public function logout_should_destroy_session()
    {
        session()->set(['logged_in' => true, 'user_id' => 1]);
        $result = $this->get('/logout');
        $result->assertRedirectTo('/index');
        $this->assertFalse(session()->has('logged_in'));
    }
}
