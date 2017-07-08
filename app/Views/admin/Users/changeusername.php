<?php 
med\app\App::getInstance()->titre='Changer Votre Nom D\'utilisateur';
?>
<form method="post" action="#" >

    <div class="container col-sm-8">
         <h2 class="form-signin-heading">Changer Votre Username</h2>
         <?= $l->input('new_user','Nouveau Username','text','username'); ?>
         <?= $l->input('ancien_pass','Mots de passe','password','enter old password'); ?>
        <div class="text-right">
            <?= $l->submit(); ?>
        </div>
    </div>
</form>
