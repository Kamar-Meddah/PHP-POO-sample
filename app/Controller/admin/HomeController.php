<?php
namespace med\app\Controller\admin;
use \med\app\App;
use \med\core\Auth\DBAuth;

class HomeController extends AppController
{

    public function index()
    {
        return $this->render('admin.index');
    }
}