<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class BackendFilter implements FilterInterface
{
    public function before(RequestInterface $request) {
        $auth = \Config\Services::auth();
        if (!$auth->isAdminLoggedIn()) {
            return redirect('backend/login');
        }
    }

    //--------------------------------------------------------------------

    public function after(
        RequestInterface $request,
        ResponseInterface $response) {
        // Do something here
    }
}