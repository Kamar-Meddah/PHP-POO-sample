<?php
namespace med\app\Controller\admin;
use \med\app\App;
use \med\core\Auth\DBAuth;

class AppController extends \med\app\Controller\AppController
{
    protected $template="admin.default";

    public function __construct()
    {
        parent::__construct();
        $auth=new DBAuth(App::getInstance()->getdb());

        if(!$auth->logged())
        {
            $this->Forbidden();
        }
    }
}