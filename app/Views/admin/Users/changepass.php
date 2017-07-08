<?php 
med\app\App::getInstance()->titre='Changer Votre Mot de passe';


?>

<form method="post" action="#" >

    <div class="container col-sm-8">
         <h2 class="form-signin-heading">Nouveau mot de passe</h2>
         <?= $l->input('ancien_pass','Ancien Mots de passe','password','enter old password'); ?>
         <?= $l->input('new_pass','Nouveau Mots de passe','password','enter new password'); ?>
        <div class="text-right">
            <?= $l->submit(); ?>
        </div>
    </div>
</form>
