<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class CheckAdminConfig implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {        
        $blogModel  = new \App\Models\BlogModel();
        if( empty($blogModel->find(1)) ){
            return redirect()->to('/admin/blog');
        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}