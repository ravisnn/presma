<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

class BlogTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    /** @test */
    public function blog_page_should_be_accessible_or_redirect()
    {
        $result = $this->get('/blog/1');

        // Pastikan tidak error 500, boleh 200 OK atau redirect
        $this->assertTrue(
            $result->isOK() || $result->isRedirect(),
            'Halaman blog tidak bisa diakses atau error.'
        );
    }
}
