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
        // Create user class instance
        $user = new UserModel();

        // Get all registered users
        $data['users'] = $user->getUsers();
        $data['title'] = 'Users';

        // Display users management page
        $data['content'] = view('backend/users/index', $data);
        echo view($this->backend, $data);
    }

    /**
     * Delete users
     *
     * @param int $id
     * @return void
     */
    public function deleteUser(int $id) {
        // Create user class instance
        $user = new UserModel();

        // Delete registered user by selected ID
        $query = $user->delete(['id' => $id]);

        // Check if user has been deleted
        if ($user->db->affectedRows() === 1) {
            // Set success flash data
            $this->session->setFlashdata(
                'success',
                'User has been deleted'
            );

            // Redirect to prev route
            return redirect()->to(\site_url('backend/users'));
        } else {
            // Set error flash data
            $this->session->setFlashdata(
                'error',
                'Failed to delete data'
            );

            // Redirect to prev route
            return redirect()->to(\site_url('backend/users'));
        }
    }
}
