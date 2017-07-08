<?php
namespace med\app\Controller\admin;
use \med\app\App;

class CategoriesController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadmodel('articles');
        $this->loadmodel('categories');
    }
    public function index()
    {
        $parpage=6;
        $total=$this->categories->count()->total;
        $page=isset($_GET['n']) ? intval($_GET['n']): 0 ;
        $nbpage=ceil($total/$parpage);
        $categories = $this->categories->allP(["arg1"=>$page*$parpage,"arg2" =>$parpage]);
        return $this->render('admin.categories.index',compact("categories","nbpage"));
    }
    
    public function add()
    {
        $l=new \med\core\html\Form($_POST);

        if(!empty($_POST))
        {
           $result= $this->categories->create(['titre'=>$_POST['titre'],]);
                                  if($result)
                                  {
                                    App::getInstance()->getflash()->setFlash('Votre Categorie a été ajouté','success');
                                    header("location:index.php?p=admin.categories.edit&id=".App::getInstance()->getdb()->lastInsertId());
                                  }
        }
        $categories=$this->categories->extract("id","titre");
        return $this->render('admin.categories.edit',compact("l","result","categories"));
    }
    
    public function edit()
    {
        if(isset($_GET['id']))
        {
        $post=$this->categories->find($_GET['id']);
        if($post === false)
        {
            $this->NotFound();
        }else{
        $l=new \med\core\html\Form($post);

        if(!empty($_POST))
        {
           $result= $this->categories->update($_GET['id'],['titre'=>$_POST['titre']]);
                                  if($result)
                                  {
                                      App::getInstance()->getflash()->setFlash('Votre Categorie a été mise a jour','success');
                                      header("location:index.php?p=admin.categories.edit&id=".$_GET['id']);
                                  }
        }
        return $this->render('admin.categories.edit',compact("l","result","categories","post"));
        }
        }else{$this->NotFound();}
    }
    
    public function delete()
    {
        if(!empty($_POST))
        {
          $this->articles->deletekey($_POST['id']);
          $result=$this->categories->delete($_POST['id']);
          App::getInstance()->getflash()->setFlash('Votre Categorie a été Supprimer','danger');
          header("location:index.php?p=admin.categories.index");
        }
    }

}