<?php namespace Backend;

use App\Models\AdminModel;
use App\Models\UserModel;
use App\Models\NewsModel;
use App\Controllers\BaseController;

class Admin extends BaseController
{

    /**
     * Admin dashboard
     *
     * @return void
     */
    public function index()
    {
        // Create model instances
        $news = new NewsModel;
        $user = new UserModel;

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
    public function login()
    {
        $data['content'] = view('backend/login');
        $data['title'] = 'Admin Login';
        echo view($this->backend, $data);
    }

    /**
     * Check user authentication
     *
     * @return void
     */
    public function auth()
    {
        // Create admin model instance
        $admin = new AdminModel;

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
            $get_auth = $admin->getAdminCredential($args);

            // Check auth
            if (!empty($get_auth)) {
                // Create session data
                $sess_data = [
                    'username' => $username,
                    'name' => $get_auth->name,
                    'isLoggedIn' => true,
                    'isAdmin' => true
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
    public function register()
    {
        // Create model instance
        $admin = new AdminModel;

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
                'admin_register'
            ) === false) {
                $this->session->setFlashdata(
                    'errors',
                    $this->validation->getErrors()
                );
                return redirect()->to('register');
            } else {
                // Save admin data
                $save = $admin->save([
                    'name' => $this->request->getVar('name'),
                    'username' => $this->request->getVar('username'),
                    'password' => password_hash(
                        $this->request->getVar('password'),
                        PASSWORD_BCRYPT
                    )
                ]);

                // Check if data has been saved
                if ($save === true) {
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
     * Get admin data
     *
     * @return void
     */
    public function getAdminData()
    {
        // Create admin instance
        $admin = new AdminModel;

        // Get username from active session
        $username = $this->session->get('username');

        // Get admin data
        $data['admin'] = $admin->getAdminData($username);
        $data['title'] = 'Admin Settings';
        $data['content'] = view('backend/profile', $data);
        echo view($this->backend, $data);

        // Check http method
        if ($this->request->getMethod() === 'post') {
            // Check form validation
            if ($this->validation->run(
                $this->request->getPost(),
                'admin_register'
            ) === false) {
                $this->session->setFlashdata(
                    'errors',
                    $this->validation->getErrors()
                );
                return redirect()->to('settings/'.$username);
            } else {
                // Update admin data
                $items = [
                    'name' => $this->request->getVar('name'),
                    'username' => $this->request->getVar('username'),
                    'password' => password_hash(
                        $this->request->getVar('password'),
                        PASSWORD_BCRYPT
                    )
                ];

                $update = $admin->updateAdmin($items);

                // Check if data has been saved
                if ($update !== null) {
                    // Remove current username
                    $current_session_items = ['username', 'name'];
                    $this->session->remove($current_session_items);

                    // Set new one
                    $sess_data = [
                        'username' => $update->username,
                        'name' => $update->name,
                    ];
                    $this->session->set($sess_data);

                    // Set success flash data
                    $this->session->setFlashdata(
                        'success',
                        'Admin has been updated'
                    );

                    // Redirect to login page
                    return redirect()->to(\site_url('backend/dashboard'));
                } else {
                    // Redirect to prev route and set error flash data
                    return redirect()
                            ->back()
                            ->with(
                                'errors',
                                array('Failed to update data')
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
    public function logout()
    {
        $this->session->destroy();
        return redirect('backend/login');
    }
}
