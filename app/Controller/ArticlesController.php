<?php
namespace med\app\Controller;
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
        $categories=$this->categories->all();
        $parpage=6;

        $page=isset($_GET['n']) ? intval($_GET['n']): 0 ;

        if(isset($_GET['search']))
        {
           $total=$this->articles->countsearch($_GET['search'])->total;
           $nbpage=ceil($total/$parpage);
           $article=$this->articles->search($_GET['search'],["arg1"=>$page*$parpage,"arg2" =>$parpage]);
        }else
        {
           $total=$this->articles->count()->total;
           $nbpage=ceil($total/$parpage);
           $article=$this->articles->last(["arg1"=>$page*$parpage,"arg2" =>$parpage]);
        }
        return $this->render('articles.index',compact("article","categories","nbpage","test"));
    }

    public function categories()
    {
        if(isset($_GET['id']))
        {

        $total=$this->articles->countByCategorie($_GET['id'])->total;
        $parpage=6;
        $nbpage=ceil($total/$parpage);
        $page=isset($_GET['n']) ? intval($_GET['n']): 0 ;

        $categorie=$this->categories->find($_GET['id']);
        $article=$this->articles->lastByCategorie($_GET['id'],["arg1"=>$page*$parpage,"arg2" =>$parpage]);
        $categories=$this->categories->all();

        if($categorie === false)
        {
             $this->NotFound();
        }
        return $this->render('articles.categories',compact("article","categories","categorie","nbpage"));
        }else{$this->NotFound();}
    }
    public function show()
    {
        if(isset($_GET['id']))
        {
        $post=$this->articles->find($_GET['id']);
        $images=$this->images->find($_GET['id']);
        if($post === false)
        {
           $this->NotFound();
           die();
        }
        $l=new \med\core\html\Form();
        if(!empty($_POST)&& !isset($_POST['delete_comment']) )
        {
        $this->comments->create(["name"=>$_POST['name'],
                                      "content"=>$_POST['comment'],
                                      "articles_id"=>$_GET['id']
                                      ]);
        App::getInstance()->getflash()->setFlash("Votre Commentaire a bien été poster","success");
        header("location:index.php?p=articles.show&id=".$_GET['id']);
        }
        $comments=$this->comments->find($_GET['id']);
        $com=json_encode($comments);
        //suppression du comments
        if(isset($_POST['delete_comment']))
        {
            $this->comments->delete($_POST['delete_comment']);
            App::getInstance()->getflash()->setFlash("Le commentaire a bien été supprimer","success");
            header("location:index.php?p=articles.show&id=".$_GET['id']);
        }
        return $this->render('articles.show',compact("post","images","comments",'l',"com"));
        }else{$this->NotFound();}
    }


}