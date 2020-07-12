<?php namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model {
    protected $table = 'news';

    protected $allowedFields = ['title', 'slug', 'img_path', 'body'];

    function __construct() {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
    }

    /**
     * Fetch data
     *
     * @param string $slug
     * @return array
     */
    public function getNews($slug = FALSE) {
        if ($slug === FALSE) {
            return $this->builder->get()->getResultArray();
        }

        return $this->builder->getWhere(['slug' => $slug])
                            ->getFirstRow('array');
    }

    /**
     * Update data
     *
     * @param array $data
     * @return boolean
     */
    public function updateNews($data) {
        $this->builder->where('id', $data['id']);
        $query = $this->builder->update($data);

        if ($query) {
            return TRUE;
        }

        return FALSE;
    }
}