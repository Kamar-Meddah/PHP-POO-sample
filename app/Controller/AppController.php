<?php
namespace med\app\Controller;
use \med\core\Controller\Controller;
use \med\app\App;


class AppController extends Controller
{
    protected $template="default";

    public function __construct()
    {
        $this->viewPath= ROOT."app/Views/";
    }

    protected function loadmodel($model_name)
    {
          $this->$model_name=App::getInstance()->getTable($model_name);
    }

    public function NotFound()
    {
        header('HTTP:/1.0 404 Not found');
        return $this->render('articles.error');

    }

    public function Forbidden()
    {
        echo "Error http/1.1 403 unauthorized";
        die();

    }
}