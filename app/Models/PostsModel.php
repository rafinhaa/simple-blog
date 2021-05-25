<?php

namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model
{
    protected $table      = 'posts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'slug', 'body', 'photo_post'];
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;

    public function getPosts($slug = false, $paginate = null){
    if ($slug === false && is_null($paginate)){
       return $this->orderBy('created_at', 'DESC')->findAll();       
    }else if (!is_null($paginate) && $paginate > 0){
        return $this->orderBy('created_at', 'DESC')->paginate($paginate,'blog');
    }
    return $this->asArray()
                ->where(['slug' => $slug])
                ->first();
    }
}