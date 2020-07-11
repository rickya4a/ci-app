<?php namespace Frontend;

use App\Controllers\BaseController;

use App\Models\NewsModel;

class Home extends BaseController {

    public function index() {
        $model = new NewsModel();

        $data['news'] = $model->getNews();
        $data['title'] = 'JMH | Home';
        $data['content'] = view('pages/home', $data);
        echo view('templates/layout', $data);
    }
}
