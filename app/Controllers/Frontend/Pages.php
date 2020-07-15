<?php namespace Frontend;

use \CodeIgniter\Exceptions\PageNotFoundException;

use App\Controllers\BaseController;

use App\Models\NewsModel;

class Pages extends BaseController {
    public function view($slug = FALSE) {
        $model = new NewsModel();

        $data['news'] = $model->getNews($slug);
        $data['allNews'] = $model->getNews();
        if ($slug === 'about') {
            $data['title'] = 'About';
            $data['content'] = view('pages/about', $data);
            echo view('templates/layout', $data);
        } else {
            if (empty($data['news'])) {
                throw new PageNotFoundException(
                    'Cannot find the news item: '. $slug
                );
            }
            $data['title'] = $data['news']['title'];

            $data['content'] = view('pages/news', $data);
            echo view('templates/layout', $data);
        }
    }
}