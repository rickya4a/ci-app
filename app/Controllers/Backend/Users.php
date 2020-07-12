<?php namespace Backend;

use App\Models\UserModel;

use App\Controllers\BaseController;

class Users extends BaseController {

    /**
     * Users admin
     *
     * @return void
     */
    public function index() {
        $user = new UserModel();

        $data['users'] = $user->getUsers();
        $data['title'] = 'Users';
        $data['content'] = view('backend/users/index', $data);
        echo view($this->backend, $data);
    }

    /**
     * Delete users
     *
     * @param int $id
     * @return void
     */
    public function deleteUsers($id) {
        $user = new UserModel();
        $query = $user->delete(['id' => $id]);

        if ($user->db->affectedRows() === 1) {
            $this->session->setFlashdata(
                'success',
                'User has been deleted'
            );

            return redirect()->to(\site_url('backend/users'));
        } else {
            $this->session->setFlashdata(
                'error',
                'Failed to delete data'
            );

            return redirect()->to(\site_url('backend/users'));
        }
    }
}
