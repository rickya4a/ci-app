<?php namespace Config\Services;

class PageService
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    /**
     * Set active class
     *
     * @param string $slug
     * @return void
     */
    public function active(string $slug)
    {
        if (\uri_string() === $slug) {
            echo 'active';
        }
    }

    /**
     * Set layout class based on routes
     *
     * @return void
     */
    public function admin_body()
    {
        $uri = \uri_string();
        switch ($uri) {
            case 'backend/login':
                echo 'hold-transition login-page';
                break;
            case 'backend/register':
                echo 'hold-transition register-page';
                break;
            default:
                echo 'hold-transition sidebar-mini';
                break;
        }
    }
}
