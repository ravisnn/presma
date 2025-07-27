<?php

namespace App\Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

class IndexTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    /** @test */
    public function it_checks_if_admin_user_exists_in_database()
    {
        $userModel = new \App\Models\UsersModel();
        $adminUser = $userModel->where('username', 'Admin')->first();

        $this->assertNotNull($adminUser, 'User dengan username "Admin" harus ada di database.');
        $this->assertEquals('Admin', $adminUser['username']);
    }

    /** @test */
    public function prestasi_page_should_load_and_match_content()
    {
        $result = $this->get('/prestasi');
        $result->assertStatus(200);
        // Pastikan kata "prestasi" muncul di halaman
        $result->assertSee('prestasi');
    }

    /** @test */
    public function logout_should_destroy_session_and_redirect()
    {
        // Set session login untuk simulasi user yang sedang login
        session()->set(['logged_in' => true, 'user_id' => 1]);

        $result = $this->get('/logout');
        // Setelah logout, user diarahkan ke halaman index
        $result->assertRedirectTo('/index');
        // Pastikan session 'logged_in' sudah dihapus
        $this->assertFalse(session()->has('logged_in'));
    }
}
