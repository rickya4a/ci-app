<?php namespace Backend;

use App\Models\UserModel;
use App\Controllers\BaseController;

class Backend extends BaseController {

    /**
     * Show login form
     *
     * @return void
     */
    public function login() {
        $data['content'] = view('backend/login');
        echo view('templates/layout', $data);
    }

    /**
     * Check user authentication
     *
     * @return void
     */
    public function auth() {
        $user_model = new UserModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $args = array($username, $password);
        $get_auth = $user_model->getUser($args);

        if ($get_auth === TRUE) {
            $sess_data = [
                'username' => $username,
                'isLoggedIn' => TRUE,
                'isAdmin' => TRUE
            ];

            $this->session->set($sess_data);

            return redirect('backend/news/create');
        }
    }

    /**
     * Register new user
     *
     * @return void
     */
    public function register() {
        $user_model = new UserModel();

        $items = array(
            'required',
            'is_unique[users.username]',
            'min_length[3]',
            'alpha_numeric',
            'max_length[15]'
        );
        $rules = implode("|", $items);

        if (! $this->validate([
            'username' => $rules,
            'password' => 'required|min_length[6]'
        ])) {
            $data['content'] = view('backend/register');
            echo view('templates/layout', $data);
        } else {
            $save = $user_model->save([
                'username' => $this->request->getVar('username'),
                'password' => \password_hash(
                    $this->request->getVar('password'),
                    PASSWORD_BCRYPT
                )
            ]);
            if ($save === TRUE) {
                $this->session->setFlashdata(
                    'success',
                    'User has been added successfully'
                );

                $data['success'] = $this->session->get('success');
                echo view('backend/login', $data);
            } else {
                $this->session->setFlashdata(
                    'error',
                    'Failed to insert data'
                );

                $data['error'] = $this->session->get('error');
                echo view('backend/register', $data);
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