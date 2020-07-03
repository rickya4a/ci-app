<?php namespace Frontend;

use App\Models\UserModel;

use App\Controllers\BaseController;

class Users extends BaseController {

    public function auth() {
        $user_model = new UserModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $validate = $this->validation->setRules([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username tidak boleh kosong'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong',
                    'min_length[6]' => 'Password kurang dari 6 karakter'
                ]
            ]
        ]);

        if (!$this->validation->withRequest($this->request)->run()) {
            $errors = $this->validation->getErrors();
            return redirect()->back()->withInput();
        } else {

            $args = array($username, $password);
            $get_auth = $user_model->getUser($args);

            if ($get_auth === TRUE) {
                $sess_data = [
                    'username' => $username,
                    'isLoggedIn' => TRUE,
                    'isAdmin' => TRUE
                ];

                $this->session->set($sess_data);

                return redirect('/');
            } else {
                return redirect()
                        ->back()
                        ->with('error', 'Username atau password salah');
            }
        }
    }

    public function register() {
        $user_model = new UserModel();

        if (!$this->validate([
            'nama_pasien' => 'required|alpha_space|max_length[50]',
            'email' => 'required|valid_email',
            'username' => $this->rules(array(
                                    'required',
                                    'alpha_numeric',
                                    'min_length[3]',
                                    'max_length[25]',
                                    'is_unique[users.username]'
                                )),
            'password' => $this->rules(array(
                                    'required',
                                    'alpha_numeric',
                                    'min_length[6]',
                                    'max_length[255]'
                                )),
            'no_hp' => $this->rules(array(
                                    'required',
                                    'numeric',
                                    'min_length[10]',
                                    'max_length[15]'
                                )),
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required|alpha_numeric_punct|max_length[255]',
            'no_ktp' => 'required|alpha_numeric|exact_length[16]'
        ])) {
            $data = [
                'title' => 'Register'
            ];
            $data['content'] = view('users/register', $data);
            echo view('templates/layout', $data);
        } else {
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
                'id_no' => $this->request->getVar('no_ktp')
            ]);

            if ($save === TRUE) {
                $this->session->setFlashdata(
                    'success',
                    'User has been added successfully'
                );

                $data['success'] = $this->session->get('success');
                return redirect()->to(\site_url('/'));
            } else {
                $this->session->setFlashdata(
                    'error',
                    'Failed to insert data'
                );

                $data['error'] = $this->session->get('error');
                return redirect()->back()->with('error', 'Failed to insert data');
            }
        }
    }

    public function logout() {
        $this->session->destroy();
        return redirect()->to('/');
    }
}
