<?php namespace Frontend;

use App\Models\UserModel;
use App\Controllers\BaseController;

class Users extends BaseController
{

    /**
     * User authentication
     *
     * @return void
     */
    public function auth()
    {
        $user_model = new UserModel;

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $items = $this->request->getPost();

        if (!$this->validation->run($items, 'auth')) {
            return redirect()
                    ->back()
                    ->with('errors_login', $this->validation->getErrors());
        } else {
            $args = array($username, $password);
            $get_auth = $user_model->getUserCredential($args);

            if ($get_auth === true) {
                $sess_data = [
                    'username' => $username,
                    'isLoggedIn' => true,
                    'isAdmin' => false
                ];
                $this->session->set($sess_data);
                return redirect('/');
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
     * Create new user
     *
     * @return void
     */
    public function register()
    {
        $user_model = new UserModel;

        if (empty($this->request->getPost())) {
            $data['title'] = 'User Registration';
            $data['content'] = view('users/register', $data);
            return view('templates/layout', $data);
        } else {
            if ($this->validation->run(
                $this->request->getPost(),
                'register'
            ) === false) {
                $this->session->setFlashdata(
                    'errors',
                    $this->validation->getErrors()
                );
                return redirect()->to('register');
            } else {
                // Save user data
                $save = $user_model->save([
                    'name' => $this->request->getVar('nama_pasien'),
                    'email' => $this->request->getVar('email'),
                    'username' => $this->request->getVar('username'),
                    'password' => password_hash(
                        $this->request->getVar('password'),
                        PASSWORD_BCRYPT
                    ),
                    'phone' => $this->request->getVar('no_hp'),
                    'sex' => $this->request->getVar('jenis_kelamin'),
                    'date_of_birth' => $this->request->getVar('tanggal_lahir'),
                    'place_of_birth' => $this->request->getVar('tempat_lahir'),
                    'address' => $this->request->getVar('alamat'),
                    'religion' => $this->request->getVar('agama'),
                    'status_meried' => $this->request->getVar('status_perkawinan'),
                    'id_no' => $this->request->getVar('no_ktp')
                ]);
                if ($save === true) {
                    $this->session->setFlashdata(
                        'success',
                        'Berhasil registrasi'
                    );
                    return redirect()->to(\site_url('/'));
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
     * Reset user password
     *
     * @return void
     */
    public function reset_password()
    {
        $user_model = new UserModel;

        $username = $this->request->getPost('username');

        if ($this->request->getMethod() !== 'post') {
            $data['title'] = 'Reset Password';
            $data['content'] = view('users/reset_password', $data);
            return view('templates/layout', $data);
        } else {
            $this->validation->setRules([
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username tidak boleh kosong'
                    ]
                ],
            ]);
            if ($this->validation->withRequest($this->request)->run()) {
                $data['user'] = $user_model->getUser($username);
                if ($data['user']) {
                    $data['title'] = 'Reset Password';
                    $data['content'] = view('users/confirmation_reset', $data);
                    return view('templates/layout', $data);
                } else {
                    return redirect()
                            ->back()
                            ->with('errors', array('User tidak ditemukan'));
                }
            } else {
                return redirect()
                            ->back()
                            ->with('errors', $this->validation->getErrors());
            }
        }
    }

    /**
     * Reset password confirmation
     *
     * @return void
     */
    public function confirm_reset_password()
    {
        $user_model = new UserModel;

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $confirm_password = $this->request->getVar('confirm_password');
        $items = $this->request->getPost();

        if (!$this->validation->run($items, 'reset_password')) {
            $this->session->setFlashdata(
                'errors',
                $this->validation->getErrors()
            );
            return redirect()->back()->withInput();
        } else {
            $args = array($username, $password);
            $save_user = $user_model->resetPassword($args);

            if ($save_user === true) {
                $this->session->setFlashdata(
                    'success',
                    'Password berhasil direset'
                );

                return redirect()->to(\site_url('/'));
            } else {
                return redirect()
                        ->back()
                        ->with(
                            'errors',
                            array('Terjadi kesalahan, silakan coba kembali')
                        );
            }
        }
    }

    /**
     * Logout user session
     *
     * @return void
     */
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }
}
