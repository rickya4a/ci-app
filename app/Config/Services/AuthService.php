<?php namespace Config\Services;

class AuthService
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    /**
     * Check user auth
     *
     * @return boolean
     */
    public function isLoggedIn()
    {
        if ($this->session->get('isLoggedIn')) {
            return 1;
        }
    }

    /**
     * Check admin auth
     *
     * @return boolean
     */
    public function isAdminLoggedIn()
    {
        if ($this->session->get('isAdmin')) {
            return 1;
        }
    }
}
