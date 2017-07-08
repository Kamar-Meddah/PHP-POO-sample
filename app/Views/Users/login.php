<?php \med\app\App::getInstance()->titre='Login'; ?>
<form method="post" action="#"  class="form-signin">

    <div class="container col-sm-8">
            <h2 class="form-signin-heading">Please sign in</h2>

         <?= $l->input('username','Pseudo','text','username'); ?>
         <?= $l->input('password','Mots de passe','password','password'); ?>
         
        <div class="text-right">
            <?= $l->submit(); ?>
        </div>
    </div>
</form>