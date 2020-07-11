<?php namespace Config\Services;

class PageService {
    function __construct() {
        $this->session = \Config\Services::session();
    }

    public function active($slug) {
        if (uri_string() === $slug) echo 'active';
    }

    public function admin_body() {
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
