<?php

namespace med\app\Entity;
use \med\core\Entity\Entity;

class ArticlesEntity extends Entity
{
    /**
     * permet de generer l'url de l'article
     *
     * @return String
    **/
    public function getUrl()
    {
      return '?p=articles.show&id='.$this->id;
    }

    /**
     * permet d'extraire une partie d'un contenu
     *
     * @return String
    **/
    public function getExtrait()
    {
      $content= '<p>'.substr($this->contenu,0,100).'   ...<br>';
      $content.='<a href="'.$this->getUrl().'">voir la suite</a></p>';
      return $content;
    }


}