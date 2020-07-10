<?php namespace Backend;

use App\Models\AdminModel;
use App\Controllers\BaseController;

class Admin extends BaseController {

    /**
     * Admin dashboard
     *
     * @return void
     */
    public function index() {
        $data['title'] = 'Admin Dashboard';
        $data['content'] = view('backend/dashboard', $data);
        echo view($this->backend, $data);
    }

    /**
     * Show login form
     *
     * @return void
     */
    public function login() {
        $data['content'] = view('backend/login');
        $data['title'] = 'Admin Login';
        echo view($this->backend, $data);
    }

    /**
     * Check user authentication
     *
     * @return void
     */
    public function auth() {
        $admin_model = new AdminModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $items = $this->request->getPost();

        if (!$this->validation->run($items, 'auth')) {
            return redirect()
                    ->back()
                    ->with('errors_login', $this->validation->getErrors());
        } else {
            $args = array($username, $password);
            $get_auth = $admin_model->getAdminCredential($args);

            if (!empty($get_auth)) {
                $sess_data = [
                    'username' => $username,
                    'name' => $get_auth[0]->name,
                    'isLoggedIn' => TRUE,
                    'isAdmin' => TRUE
                ];

                $this->session->set($sess_data);

                return redirect('backend/dashboard');
            } else {
                return redirect()
                        ->back()
                        ->with(
                            'errors_login',
                            array('Username atau password salah')
                        );
            }
        }
    }

    /**
     * Create new admin
     *
     * @return void
     */
    public function register() {
        $admin_model = new AdminModel();

        if (empty($this->request->getPost())) {
            $data['title'] = 'Create Admin';
            $data['content'] = view('backend/register', $data);
            return view($this->backend, $data);
        } else {
            if ($this->validation->run(
                $this->request->getPost(),
                'admin_register') === FALSE) {
                $this->session->setFlashdata(
                    'errors',
                    $this->validation->getErrors()
                );
                return redirect()->to('register');
            } else {
                // Save admin data
                $save = $admin_model->save([
                    'name' => $this->request->getVar('name'),
                    'username' => $this->request->getVar('username'),
                    'password' => password_hash(
                        $this->request->getVar('password'),
                        PASSWORD_BCRYPT
                    )
                ]);
                if ($save === TRUE) {
                    $this->session->setFlashdata(
                        'success',
                        'Berhasil menambahkan akun'
                    );
                    return redirect()->to(\site_url('backend/login'));
                } else {
                    return redirect()
                            ->back()
                            ->with(
                                'errors',
                                array('Failed to insert data')
                            );
                }
            }
        }
    }

    /**
     * End backend session
     *
     * @return void
     */
    public function logout() {
        $this->session->destroy();
        return redirect('backend/login');
    }
}