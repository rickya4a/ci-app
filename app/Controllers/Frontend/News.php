<?php namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class News extends BaseController {

    /**
     * Fetch all data
     *
     * @return void
     */
    public function index() {
        $model = new NewsModel();
        $data = [
            'news' => $model->getNews(),
            'title' => 'News Archive'
        ];

        $data['content'] = view('news/overview', $data);
        echo view('templates/layout', $data);
    }

    /**
     * Get single data
     *
     * @param string $slug
     * @return void
     */
    public function view($slug = null) {
        $model = new NewsModel();

        $data['news'] = $model->getNews($slug);

        if (empty($data['news'])) {
            throw new PageNotFoundException(
                'Cannot find the news item: '. $slug
            );
        }

        $data['title'] = $data['news']['title'];

        $data['content'] = view('news/view', $data);
        echo view('templates/layout', $data);
    }

    /**
     * Create new entry
     *
     * @return void
     */
    public function create() {
        $model = new NewsModel();

        if (! $this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'body'	=> 'required'
        ])) {
            $data['content'] = view('news/create');
            echo view('templates/layout', $data);
        } else {
            $save = $model->save([
                'title' => $this->request->getVar('title'),
                'slug'	=> url_title($this
                                    ->request
                                    ->getVar('title'), '-', TRUE),
                'body'	=> $this->request->getVar('body')
            ]);

            if ($save === true) {
                $this->session->setFlashdata(
                    'success',
                    'News item created successfully'
                );

                $data['success'] = $this->session->get('success');
                echo view('news/success', $data);
            } else {
                $this->session->setFlashdata(
                    'error',
                    'Failed to insert data'
                );

                $data['error'] = $this->session->get('error');
                echo view('news/error', $data);
            }
        }
    }
}