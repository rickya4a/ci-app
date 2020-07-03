<?php namespace Frontend;

use \CodeIgniter\Exceptions\PageNotFoundException;

use App\Controllers\BaseController;

class Pages extends BaseController {
    public function index() {
        return view('welcome_message');
    }

    public function view($page = 'home') {
        if (! is_file(APPPATH.'/Views/pages/'.$page.'.php')) {
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['content'] = view('pages/'.$page, $data);
        echo view('templates/layout', $data);
    }
}