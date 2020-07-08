<?php namespace Config\Services;

class PageService {
    function __construct() {
        $this->session = \Config\Services::session();
    }

    public function active($slug) {
        if (uri_string() === $slug) echo 'active';
    }

    public function admin_body() {
        if (uri_string() === 'backend/login') {
            echo 'hold-transition login-page';
        } else {
            echo 'hold-transition sidebar-mini layout-fixed';
        }
    }
}
