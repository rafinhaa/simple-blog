<?php

namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model
{
    protected $table      = 'posts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'slug', 'body'];
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;/*
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';*/

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