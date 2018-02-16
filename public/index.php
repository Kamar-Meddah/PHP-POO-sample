<?php
define('ROOT','../',__DIR__.'/');
session_start();
require ROOT."core/Autoloader.php";
\med\Autoloader::register();

echo \med\app\App::getInstance()->getflash()->getFlash();

if(isset($_GET['p'])){
    $p=$_GET['p'];
}else{
    $p='articles.index';
}
    switch($p)
    {
        case 'articles.index':
            $controller=new \med\app\Controller\ArticlesController();
            $controller->index();
            break;

        case 'users.login':
            $controller=new \med\app\Controller\UsersController();
            $controller->login();
            break;

        case 'users.logout':
            $controller=new \med\app\Controller\UsersController();
            $controller->logout();
            break;

        case 'articles.categories':
            $controller=new \med\app\Controller\ArticlesController();
            $controller->categories();
            break;

        case 'articles.show':
            $controller=new \med\app\Controller\ArticlesController();
            $controller->show();
            break;

        case 'admin.articles.index':
            $controller=new \med\app\Controller\admin\ArticlesController();
            $controller->index();
            break;

        case 'admin.articles.delete':
            $controller=new \med\app\Controller\admin\ArticlesController();
            $controller->delete();
            break;

        case 'admin.articles.edit':
            $controller=new \med\app\Controller\admin\ArticlesController();
            $controller->edit();
            break;

        case 'admin.articles.add':
            $controller=new \med\app\Controller\admin\ArticlesController();
            $controller->add();
            break;
        case 'admin.home.index':
            $controller=new \med\app\Controller\admin\HomeController();
            $controller->index();
            break;
        

        case 'admin.categories.index':
            $controller=new \med\app\Controller\admin\CategoriesController();
            $controller->index();
            break;

        case 'admin.categories.delete':
            $controller=new \med\app\Controller\admin\CategoriesController();
            $controller->delete();
            break;

        case 'admin.categories.edit':
            $controller=new \med\app\Controller\admin\CategoriesController();
            $controller->edit();
            break;

        case 'admin.categories.add':
            $controller=new \med\app\Controller\admin\CategoriesController();
            $controller->add();
            break;

        case 'admin.users.changepass':
            $controller=new \med\app\Controller\admin\UsersController();
            $controller->changepass();
            break;

        case 'admin.users.changeusername':
            $controller=new \med\app\Controller\admin\UsersController();
            $controller->changeusername();
            break;

        default :
            $controller=new \med\app\Controller\AppController();
            $controller->NotFound();
            break;

    }