<?php namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model {
    protected $table = 'news';

    protected $allowedFields = ['title', 'slug', 'body'];

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
}