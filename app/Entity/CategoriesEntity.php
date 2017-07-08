<?php

namespace med\app\Entity;
use \med\core\Entity\Entity;

class CategoriesEntity extends Entity
{
    public function getUrl()
    {
      return 'index.php?p=articles.categories&id='.$this->id;
    }
}