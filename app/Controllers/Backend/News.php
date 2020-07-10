<?php namespace Backend;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Controllers\BaseController;

class News extends BaseController {

    /**
     * Fetch all data
     *
     * @return void
     */
    public function index() {
        $model = new NewsModel();
        $data['news'] = $model->getNews();
        $data['title'] = 'News';
        $data['content'] = view('backend/pages/index', $data);
        return view($this->backend, $data);
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
        echo view($this->backend, $data);
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
            $data['title'] = 'Add Entry';
            $data['content'] = view('backend/pages/create', $data);
            echo view($this->backend, $data);
        } else {
            $data = $this->request->getPost();
            $data['slug'] = \url_title($data['title']);
            $data['img'] = $this->request->getFile('image');
            echo '<pre>';
            print_r($data);
            echo '</pre>';
            /* $save = $model->save([
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
            } */
        }
    }
}