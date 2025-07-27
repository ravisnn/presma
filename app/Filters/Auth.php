<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek apakah user sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $role = session()->get('role');
        $segment = service('uri')->getSegment(1); // bagian pertama URL

        // Cegah admin membuka dashboard mahasiswa
        if ($role === 'Admin' && $segment === 'dashboard_mahasiswa') {
            return redirect()->to('/dashboard_admin');
        }

        // Cegah mahasiswa membuka dashboard admin
        if ($role === 'Mahasiswa' && $segment === 'dashboard_admin') {
            return redirect()->to('/dashboard_mahasiswa');
        }

        // **Cegah mahasiswa membuka halaman khusus admin**
        if ($role === 'Mahasiswa') {
            $blockedPages = ['form', 'form_admin', 'table', 'table_admin'];

            if (in_array($segment, $blockedPages)) {
                return redirect()->to('/dashboard_mahasiswa');
            }
        }

        // **Cegah admin membuka halaman khusus mahasiswa**
        if ($role === 'Admin') {
            $blockedPagesForAdmin = ['cek_prestasi', 'report'];
            if (in_array($segment, $blockedPagesForAdmin)) {
                return redirect()->to('/dashboard_admin');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada aksi setelah request
    }
}
