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
        $data = $this->request->getPost();

        if (empty($data)) {
            $data['title'] = 'Add Entry';
            $data['content'] = view('backend/pages/create', $data);
            return view($this->backend, $data);
        } else {
            if ($this->validation->run($data, 'news') === FALSE) {
                // Set error if errrors occured
                $this->session->setFlashdata(
                    'errors',
                    $this->validation->getErrors()
                );
                // Redirect to prev route
                return redirect()->back();
            } else {
                // Get image
                $image = $this->request->getFile('image');
                // Set new name
                $file_name = $image->getRandomName();

                // Set news slug
                $data['slug'] = \url_title($data['title'], '-', TRUE);
                // define image relative path
                $data['img_path'] = 'uploads/'.$file_name;

                // Save data
                $save = $model->save([
                    'title' => $data['title'],
                    'body' => $data['body'],
                    'img_path' => $data['img_path'],
                    'slug' => $data['slug']
                ]);

                if ($save === TRUE) {
                    // Save image to WRITEPATH.'uploads'
                    $image->move(ROOTPATH . 'public/uploads', $file_name);

                    // Set success message
                    $this->session->setFlashdata(
                        'success',
                        'News item created successfully'
                    );

                    return redirect()->to(\site_url('backend/news'));
                } else {
                    // Fallback errors
                    $this->session->setFlashdata(
                        'error',
                        'Failed to insert data'
                    );
                    return redirect()->to(\site_url('backend/news'));
                }
            }
        }
    }

    public function editNews($slug) {
        $model = new NewsModel();
        $data = $this->request->getPost();

        if ($this->request->getMethod() !== 'post') {
            $data['title'] = 'Edit Entry';
            $data['news'] = $model->getNews($slug);

            $data['content'] = view('backend/pages/edit', $data);
            return view($this->backend, $data);
        } else {
            if ($this->validation->run($data, 'news') === FALSE) {
                // Set error if errrors occured
                $this->session->setFlashdata(
                    'errors',
                    $this->validation->getErrors()
                );
                // Redirect to prev route
                return redirect()->back();
            } else {
                // Get image
                $image = $this->request->getFile('image');
                // Set new name
                $file_name = $image->getRandomName();

                // Set news slug
                $data['slug'] = \url_title($data['title'], '-', TRUE);
                // define image relative path
                $data['img_path'] = 'uploads/'.$file_name;

                $idNews = $model->getNews($slug)['id'];

                $news = [
                    'id' => $idNews,
                    'title' => $data['title'],
                    'body' => $data['body'],
                    'img_path' => $data['img_path'],
                    'slug' => $data['slug']
                ];

                $update = $model->updateNews($news);

                if ($update === TRUE) {
                    // Save image to WRITEPATH.'uploads'
                    $image->move(ROOTPATH . 'public/uploads', $file_name);

                    // Set success message
                    $this->session->setFlashdata(
                        'success',
                        'News item updated successfully'
                    );

                    return redirect()->to(\site_url('backend/news'));
                } else {
                    // Fallback errors
                    $this->session->setFlashdata(
                        'error',
                        'Failed to update data'
                    );
                    return redirect()->to(\site_url('backend/news'));
                }
            }
        }

    }

    public function deleteNews($id) {
        $model = new NewsModel();
        $query = $model->delete(['id' => $id]);

        if ($model->db->affectedRows() === 1) {
            $this->session->setFlashdata(
                'success',
                'News has been deleted'
            );

            return redirect()->to(\site_url('backend/news'));
        } else {
            $this->session->setFlashdata(
                'error',
                'Failed to insert data'
            );

            return redirect()->to(\site_url('backend/news'));
        }
    }
}