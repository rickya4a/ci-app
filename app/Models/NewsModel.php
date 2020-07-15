<?php namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';

    protected $allowedFields = ['title', 'slug', 'img_path', 'body'];

    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
    }

    /**
     * Fetch data
     *
     * @param string $slug
     * @return array
     */
    public function getNews(string $slug = null)
    {
        if ($slug === null) {
            return $this->builder->get()->getResultArray();
        } elseif ($slug === 'latest') {
            return $this->builder->orderBy('updated')
                                 ->get(2)
                                 ->getResultArray();
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
    public function updateNews(array $data)
    {
        $this->builder->where('id', $data['id']);
        $query = $this->builder->update($data);

        if ($query) {
            return true;
        }

        return false;
    }
}