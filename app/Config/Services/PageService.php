<?php namespace Config\Services;

class PageService {
    function __construct() {
        $this->session = \Config\Services::session();
    }

    public function active($slug) {
        if (uri_string() === $slug) echo 'active';
    }
}
