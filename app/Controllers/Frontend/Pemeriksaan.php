<?php namespace Frontend;

use App\Models\PemeriksaanModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Controllers\BaseController;

class Pemeriksaan extends BaseController
{

    /**
     * Fetch all data
     *
     * @return void
     */
    public function index()
    {
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
    public function view()
    {
        $data['title'] = 'JMH | Booking Pemeriksaan';
        $data['content'] = view('pemeriksaan/view', $data);
        echo view('templates/layout', $data);
    }

   
    public function create()
    {

    }
}
