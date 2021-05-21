<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table      = 'blog_config';
    protected $primaryKey = 'id';
    protected $allowedFields = [
		'blog_name',
		'bio',
		'social_twitter',
		'social_linkedin',
		'social_twitter',
		'social_github',
		'social_stoverflow',
		'social_codepen',
	];
    protected $useTimestamps = true;

}
