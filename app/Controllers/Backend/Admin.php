<?php namespace Backend;

use App\Models\AdminModel;

use App\Models\UserModel;

use App\Models\NewsModel;

use App\Controllers\BaseController;

class Admin extends BaseController {

    /**
     * Admin dashboard
     *
     * @return void
     */
    public function index() {
        // Create model instances
        $news = new NewsModel();
        $user = new UserModel();

        // Count all data summary
        $data['news'] = $news->builder->countAll();
        $data['user'] = $user->builder->countAll();

        // Display admin's dashboard
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
        // Create admin model instance
        $admin_model = new AdminModel();

        // Get post data by its name attr
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // Fetch all post data
        $items = $this->request->getPost();

        // Check form validation
        if (!$this->validation->run($items, 'auth')) {
            return redirect()
                    ->back()
                    ->with('errors_login', $this->validation->getErrors());
        } else {
            // Create new params as array from username and password
            $args = array($username, $password);
            // Pass the params to model
            $get_auth = $admin_model->getAdminCredential($args);

            // Check auth
            if (!empty($get_auth)) {
                // Create session data
                $sess_data = [
                    'username' => $username,
                    'name' => $get_auth[0]->name,
                    'isLoggedIn' => TRUE,
                    'isAdmin' => TRUE
                ];

                // Set session data
                $this->session->set($sess_data);

                // Redirect to dashboard
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
        // Create model instance
        $admin_model = new AdminModel();

        // Check post data request
        if (empty($this->request->getPost())) {
            $data['title'] = 'Create Admin';

            // Display admin registration
            $data['content'] = view('backend/register', $data);
            return view($this->backend, $data);
        } else {

            // Check form validation
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

                // Check if data has been saved
                if ($save === TRUE) {
                    // Set success flash data
                    $this->session->setFlashdata(
                        'success',
                        'Berhasil menambahkan akun'
                    );

                    // Redirect to login page
                    return redirect()->to(\site_url('backend/login'));
                } else {

                    // Redirect to prev route and set error flash data
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