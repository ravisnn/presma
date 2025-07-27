<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AlreadyLoggedIn implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if the user is logged in
        if (session()->get('logged_in')) {
            // Get user role
            $role = session()->get('role');

            // Redirect based on role
            if ($role == 'Admin') {
                return redirect()->to('/dashboard_admin');
            } elseif ($role == 'Mahasiswa') {
                return redirect()->to('/dashboard_mahasiswa');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing here
    }
}
