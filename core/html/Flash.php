<?php
namespace med\core\html;

class Flash
{
    private $a=false;
    public function getFlash()
    {
       
       if(isset($_SESSION['Flash']))
       {
            extract($_SESSION['Flash']);
            if($this->a===true)
            {
               unset($_SESSION['Flash']); 

               return "<div class='container' style='overflow:hidden;'>
                        <div class='alert alert-$type alert-dismissible fade show' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span> </button>
                            $message
                        </div>
                    </div>";

             }
             $this->a=!$this->a;
   
        }
    }

    public function setFlash($message,$type)
    {
        $_SESSION['Flash']['message']=$message;
        $_SESSION['Flash']['type']=$type;
    }
}