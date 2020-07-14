<?php namespace Config\Services;

class AuthService
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function isLoggedIn()
    {
        if ($this->session->get('isLoggedIn')) {
            return 1;
        }
    }

    public function isAdminLoggedIn()
    {
        if ($this->session->get('isAdmin')) {
            return 1;
        }
    }
}
