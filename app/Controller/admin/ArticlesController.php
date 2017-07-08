<?php
namespace med\app\Controller\admin;
use \med\app\App;

class ArticlesController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadmodel('articles');
        $this->loadmodel('categories');
        $this->loadmodel('images');
        $this->loadmodel('comments');
    }

    public function index()
    {
        $parpage=6;
        $total=$this->articles->count()->total;
        $page=isset($_GET['n']) ? intval($_GET['n']): 0 ;
        $nbpage=ceil($total/$parpage);

        $articles = $this->articles->all(["arg1"=>$page*$parpage,"arg2" =>$parpage]);
        return $this->render('admin.articles.index',compact("articles","nbpage"));
    }
    
    public function add()
    {
        $l=new \med\core\html\Form($_POST);
        if(!empty($_POST))
        {
           $result= $this->articles->create(
                           [
                          'titre'=>$_POST['titre'],
                          'contenu' =>$_POST['contenu'],
                          'category_id'=>$_POST['category_id']
                           ]
                          );
          $articleid=App::getInstance()->getdb()->lastInsertId();
          if(!empty($_FILES))
          {
           $files=$_FILES['images'];
           $images=array();
           foreach($files['tmp_name'] as $k=>$v)
           {
              $image=array(
                           'name'=>$files['name'][$k],
                           'tmp_name' => $files['tmp_name'][$k]
                          );
              $extension=pathinfo($image['name'],PATHINFO_EXTENSION);
              if(in_array($extension,array('jpg','jpeg','png','ico','gif')))
              {
                 $this->images->create(["articles_id" => $articleid]);
                 $image_id=App::getInstance()->getdb()->lastInsertId();
                 $image_name=$image_id.'.'.$extension;
                 move_uploaded_file($image['tmp_name'],ROOT.'img/articles/'.$image_name);
                 $this->images->update($image_id,["name" => $image_name]);
              }
           }
          }
            if($result)
            {
                App::getInstance()->getflash()->setFlash('Votre articles a été ajouté','success');
                header("location:index.php?p=admin.articles.edit&id=".$articleid);
            }
        }
        $categories=$this->categories->extract("id","titre");
        return $this->render('admin.articles.add',compact("l","result","categories"));
    }
    
    public function edit()
    {
        if(isset($_GET['id']))
        {
        $post=$this->articles->find($_GET['id']);
        if($post === false)
        {
            $this->NotFound();
        }else{
        $l=new \med\core\html\Form($post);

        if(!empty($_POST))
        {
           $result= $this->articles->update($_GET['id'],
                                   [
                                  'titre'=>$_POST['titre'],
                                  'contenu' =>$_POST['contenu'],
                                  'category_id'=>$_POST['category_id']
                                   ]
                                  );
          //Ajout des Images
          if(!empty($_FILES))
          {
           $files=$_FILES['images'];
           $images=array();
           foreach($files['tmp_name'] as $k=>$v)
           {
              $image=array(
                           'name'=>$files['name'][$k],
                           'tmp_name' => $files['tmp_name'][$k]
                          );
              $extension=pathinfo($image['name'],PATHINFO_EXTENSION);
              if(in_array($extension,array('jpg','jpeg','png','ico','gif')))
              {
                 $this->images->create(["articles_id" => $_GET['id']]);
                 $image_id=App::getInstance()->getdb()->lastInsertId();
                 $image_name=$image_id.'.'.$extension;
                 move_uploaded_file($image['tmp_name'],ROOT.'img/articles/'.$image_name);
                 $this->images->update($image_id,["name" => $image_name]);
              }
           }
          }
          //end Ajout des Images
        if($result)
        {
            App::getInstance()->getflash()->setFlash('Votre articles a été mise a jour','success');
            header("location:index.php?p=admin.articles.edit&id=".$_GET['id']);
        }
        }
          //On recupere la liste des images
           $images=$this->images->find($_GET['id']);
          //end recupere la liste des images

          //Delete images
           if(isset($_GET['delete_image']))
           {
            $image=$this->images->findid($_GET['delete_image']);
            unlink(ROOT.'img/articles/'.$image->name);
            $this->images->delete($_GET['delete_image']);
            App::getInstance()->getflash()->setFlash("L'image a bien été supprimée","danger");
            header("location:index.php?p=admin.articles.edit&id=".$_GET['id']);
            }
          //end delete
        $categories=$this->categories->extract("id","titre");
        return $this->render('admin.articles.edit',compact("l","categories","images"));
        }
        }else{$this->NotFound();}
    }

    public function delete()
    {
        if(!empty($_POST))
        {
           $images=$this->images->find($_POST['id']);
           $comments=$this->comments->find($_POST['id']);
           foreach ($images as $image)
           {
           unlink(ROOT.'img/articles/'.$image->name);
           }
           foreach ($comments as $comment)
           {
           $this->comments->delete($comment->id);
           }
           $image=$this->images->deleteWithArticle($_POST['id']);
           $result= $this->articles->delete($_POST['id']);
           App::getInstance()->getflash()->setFlash('Votre Article a été Supprimer','danger');
           header("location:index.php?p=admin.articles.index");
        }
    }

}