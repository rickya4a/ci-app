<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class UserFilter implements FilterInterface
{
    public function before(RequestInterface $request) {
        $auth = \Config\Services::auth();
        if (!$auth->isLoggedIn()) {
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