<?php
namespace med\app\Controller\admin;
use \med\app\App;

class UsersController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadmodel('users');
    }

    public function changepass()
    { 
        $cook=App::getInstance()->getauth()->getUserId();
        $l=new \med\core\html\Form($_POST);
        if(!empty($_POST))
        {
            $result = $this->users->findpass($cook,sha1($_POST['ancien_pass']));
            if($result)
            {
                $this->users->update($cook,["password" => sha1($_POST['new_pass'])]);
                App::getInstance()->getflash()->setFlash('votre mot de passe a été changé','success');
                header("location:?p=admin.home.index");
            }else
            {
                App::getInstance()->getflash()->setFlash('Ancien mot de passe ivalid','danger');
                header("location:?p=admin.users.changepass");
            }
        }
        return $this->render('admin.users.changepass',compact("l"));
    }

    public function changeusername()
    { 
        $cook=App::getInstance()->getauth()->getUserId();
        $l=new \med\core\html\Form($_POST);
        if(!empty($_POST))
        {
            $result = $this->users->findpass($cook,sha1($_POST['ancien_pass']));
            if($result)
            {
                $this->users->update($cook,["username" => $_POST['new_user']]);
                App::getInstance()->getflash()->setFlash('votre Nom d\'utilisateur a été changé','success');
                header("location:?p=admin.home.index");
            }else
            {
                App::getInstance()->getflash()->setFlash('mot de passe invalid','danger');
                header("location:?p=admin.users.changeusername");
            }
        }
        return $this->render('admin.users.changeusername',compact("l"));
    }

}