<?php
namespace med\core\html;

/**
 * Class Form
 * permet de creé un formulaire facilement et simplement
**/
class Form {

    /**
     * @var array
     * les donnée utilisées par le formulaire
    **/
    private $data;


    /**
     * @param $data array les donnée utilisées par le formulaire
    **/
    public function __construct($data = array())
    {
        $this->data = $data;
    }

    /**
     * @param $index string index de la valeur a recupérer
     * @return string
    **/
    private function getvalue($index)
    {
        if(is_object($this->data))
        {
            return isset($this->data->$index)?$this->data->$index:null;
        }else
        {
            return isset($this->data[$index])?$this->data[$index]:null;
        }
    }


    /**
     * @param  $name string
     * @param  $label string
     * @param  $type string
    **/
    public function input($name, $label = "", $type = "text",$place="")
    {
        $return= "<div class='form-group'><label>$label</label>";
        $return.= "<input type='$type' name='$name' id='$name' value='{$this->getvalue($name)}' class='form-control control' 
                   placeholder='$place' pattern='[A-Za-z0-9_ ,]{1,}'  required></div>";
        return $return;
    }

    /**
     * permet de creé une button submit
    **/
    public function submit()
    {
        return "<button type='submit' class='btn btn-primary'>Send</button>";
    }

    /**
     * permet de creé une button reset
    **/
    public function reset()
    {
        return "<button type='reset' class='btn btn-danger'>reset</button>";
    }

    /**
     * @param  $name string
     * @param  $label
    **/
    public function textarea($name, $label = "")
    {
        $return= "<div class='form-group'><label>$label</label>";
        $return.="<textarea type='text' class='form-control control' id='$name' name='$name' >{$this->getvalue($name)}</textarea></div>";
        return $return;
    }

    /**
     * @param  $name string
     * @param  $label
     * @param  $type (radio / checkbox) * permet de crée des button radio  ou des checkbox 
    **/
    public function check($name, $label = "", $type)
    {
         return "<div class='form-group'><label class='custom-control custom-$type'>
               <input type='$type' name='$name' id='$name' class='custom-control-input'>
               <span class='custom-control-indicator'></span>
               <span class='custom-control-description'>$label</span>
               </label></div>";
    }


    /**
     * permet de crée un champ de selction
     *
     * @param [string] $name
     * @param [objet OR array] $option
     * @return string
    **/
    public function select($name,$label,$options)
    {
        $input="<label>$label</label>";
        $input.="<select class='form-control custom-select' name=$name>";
        foreach($options as $op => $v)
        {
           $selected = '';
           if ($op == $this->getvalue($name))
           {
             $selected = "selected";
           }
            $input.="<option value='$op' $selected>$v</option>";
        }
        $input.="</select>";
        return $input;

    }
}