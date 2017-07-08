<?php

namespace med\core\Entity;

class Entity
{

    /**
     * fonction magique 
     *
     * @param [String] $key
     * @return void
    **/
    public function __get($key)
    {
        $method='get'.ucfirst($key);
        $this->$key=$this->$method();
        return $this->$key;
    }

}