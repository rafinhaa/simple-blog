<?php

namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model
{
    protected $table      = 'posts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'slug', 'body'];

    public function getPosts($slug = false)
{
    if ($slug === false)
    {
        return $this->findAll();
    }
    return $this->asArray()
                ->where(['slug' => $slug])
                ->first();
    }
}