<?php namespace Frontend;

use App\Models\PemeriksaanModel;

use CodeIgniter\Exceptions\PageNotFoundException;

use App\Controllers\BaseController;

class Pemeriksaan extends BaseController {

    /**
     * Fetch all data
     *
     * @return void
     */
    public function index() {
        $model = new PemeriksaanModel();
        $data = [
            'pemeriksaan' => $model->getPemeriksaan(),
            'title' => 'pemeriksaan Archive'
        ];

        $data['content'] = view('pemeriksaan/view', $data);
        echo view('templates/layout', $data);
    }

    /**
     * Get single data
     *
     * @param string $slug
     * @return void
     */
    public function view() {
         $data['title'] = 'JMH | Booking Pemeriksaan';
        $data['content'] = view('pemeriksaan/view', $data);
        echo view('templates/layout', $data);
    }

    /**
     * Create new entry
     *
     * @return void
     */
    public function create() {
        $model = new pemeriksaanModel();

        if (! $this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'body'	=> 'required'
        ])) {
            $data['title'] = 'JMH | Booking Pemeriksaan';
            $data['content'] = view('pemeriksaan/create');
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
                    'pemeriksaan item created successfully'
                );

                $data['success'] = $this->session->get('success');
                echo view('pemeriksaan/success', $data);
            } else {
                $this->session->setFlashdata(
                    'error',
                    'Failed to insert data'
                );

                $data['error'] = $this->session->get('error');
                echo view('pemeriksaan/error', $data);
            }
        }
    }
}