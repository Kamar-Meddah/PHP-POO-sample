<?php
namespace med\app\Controller;
use \med\app\App;

class UsersController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadmodel('users');
    }

    public function login()
    {
        $auth=App::getInstance()->getauth();
        $l=new \med\core\html\Form($_POST);

        if($auth->logged())
        {
                App::getInstance()->getflash()->setFlash('Votre etes déja connecter','warning');
                header("location:index.php?p=admin.home.index");
        }

        if(!empty($_POST))
        {
            if($auth->login($_POST['username'],$_POST['password']))
            {
               App::getInstance()->getflash()->setFlash('Vous etes connecter a l\'administration','success');
               header("location:index.php?p=admin.home.index");
            }else
                {
                   App::getInstance()->getflash()->setFlash('Identifiant incorrect','danger');
                   header("location:index.php?p=users.login");
                }
        }
         return $this->render('users.login',compact("auth","l","error"));
    }

    public function logout()
    {
        App::getInstance()->getauth()->logout();
        header("location:index.php");
    }

}