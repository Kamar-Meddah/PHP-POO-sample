<?php
namespace med\core\Controller;


class Controller
{
    protected $viewPath;
    protected $template;

    public function render($view,$variables=[])
    {
        ob_start();
        extract($variables);
        require ($this->viewPath . str_replace('.','/',$view) . '.php');
        $content=ob_get_clean();
        require($this->viewPath . 'templates/'. $this->template . '.php');
    }
    
    public function NotFound()
    {
        header('HTTP:/1.0 404 Not found');
        die('<h1>Erreur 404 Page not Found</h1>');
    }
    
    public function Forbidden()
    {
        header('HTTP:/1.0 403 Forbidden');
        die('<h1>Accés interdit</h1>');
    }
}