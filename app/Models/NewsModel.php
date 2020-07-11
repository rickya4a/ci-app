<?php namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model {
    protected $table = 'news';

    protected $allowedFields = ['title', 'slug', 'img_path', 'body'];

    /**
     * Fetch data
     *
     * @param boolean $slug
     * @return array
     */
    public function getNews($slug = FALSE) {
        if ($slug === FALSE) {
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['slug' => $slug])
                    ->first();
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