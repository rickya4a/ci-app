<?php namespace Frontend;

use App\Controllers\BaseController;

class Home extends BaseController {

    public function index() {
        $data['title'] = 'Home';
        $data['content'] = view('pages/home', $data);
        echo view('templates/layout', $data);
    }
}
