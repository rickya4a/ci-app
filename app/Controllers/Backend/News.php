<?php namespace Backend;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Controllers\BaseController;

class News extends BaseController
{

    /**
     * Fetch all data
     *
     * @return void
     */
    public function index()
    {
        $model = new NewsModel;
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
    public function view(string $slug = null)
    {
        // Create news instance
        $model = new NewsModel;

        // Get news by selected slug
        $data['news'] = $model->getNews($slug);

        // Check if news availability
        if (empty($data['news'])) {
            throw new PageNotFoundException(
                'Cannot find the news item: '. $slug
            );
        }

        // Set page title based on news title
        $data['title'] = $data['news']['title'];

        // Display news page
        $data['content'] = view('news/view', $data);
        echo view($this->backend, $data);
    }

    /**
     * Create new entry
     *
     * @return void
     */
    public function create()
    {
        // Create news instance
        $model = new NewsModel;
        // Fetch all post data
        $data = $this->request->getPost();

        // Check if post data availability
        if (empty($data)) {
            $data['title'] = 'Add Entry';

            // Display create news page
            $data['content'] = view('backend/pages/create', $data);
            return view($this->backend, $data);
        } else {
            if ($this->validation->run($data, 'news') === false) {
                // Set error flash data
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
                $data['slug'] = \url_title($data['title'], '-', true);
                // define image relative path
                $data['img_path'] = 'uploads/'.$file_name;

                // Save data
                $save = $model->save([
                    'title' => $data['title'],
                    'body' => $data['body'],
                    'img_path' => $data['img_path'],
                    'slug' => $data['slug']
                ]);

                // Check if data has been saved
                if ($save === true) {
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

    /**
     * Edit news entry
     *
     * @param string $slug
     * @return void
     */
    public function editNews(string $slug)
    {
        // Create instanace from model
        $model = new NewsModel;
        // Get all post data
        $data = $this->request->getPost();

        // Check HTTP method
        if ($this->request->getMethod() !== 'post') {
            $data['title'] = 'Edit Entry';
            // Fetch news data
            $data['news'] = $model->getNews($slug);

            // Display edit news
            $data['content'] = view('backend/pages/edit', $data);
            return view($this->backend, $data);
        } else {
            if ($this->validation->run($data, 'news') === false) {
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
                $data['slug'] = \url_title($data['title'], '-', true);
                // Define image relative path
                $data['img_path'] = 'uploads/'.$file_name;

                // Get news by ID
                $idNews = $model->getNews($slug)['id'];

                // Set all new news data
                $news = [
                    'id' => $idNews,
                    'title' => $data['title'],
                    'body' => $data['body'],
                    'img_path' => $data['img_path'],
                    'slug' => $data['slug']
                ];

                // Update news data
                $update = $model->updateNews($news);

                if ($update === true) {
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

    /**
     * Delete news
     *
     * @param int $id
     * @return void
     */
    public function deleteNews(int $id)
    {
        // Create new instance
        $model = new NewsModel;
        // Delete news by selected ID
        $query = $model->delete(['id' => $id]);

        // Check if data has been deleted
        if ($model->db->affectedRows() === 1) {
            // Set success flash data
            $this->session->setFlashdata(
                'success',
                'News has been deleted'
            );

            // Redirect to prev route
            return redirect()->to(\site_url('backend/news'));
        } else {
            // Set error flash data
            $this->session->setFlashdata(
                'error',
                'Failed to delete data'
            );

            // Redirect to prev route
            return redirect()->to(\site_url('backend/news'));
        }
    }
}
