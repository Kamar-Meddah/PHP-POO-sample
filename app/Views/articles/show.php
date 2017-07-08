<?php
\med\app\App::getInstance()->titre=$post->titre;
?>

<h1><em><?=$post->titre;?></em></h1>

<p><em><?=$post->categorie;?></em></p>

    <div class="col-sm-12 col-12">
 
    
        <p><?=$post->contenu;?></p>
    <br><br>
    </div>
     
<div class="row">

 <?php foreach ($images as $image):?>
<div  class="col-sm-3 col-6">
        <a  href="img/articles/<?=$image->name;?>" data-lightbox="roadtrip"><p><img src="img/articles/<?=$image->name;?>" width="250"></p></a>
</div>
<?php endforeach; ?>
 
</div>




<div class="col-sm-6 col-8">
<br>

<h3><em>Poster Vos Commentaires</em></h3>
<form action="#" method="post">

<?= $l->input("name","Votre nom","text","Votre nom")?>
<?=$l->textarea("comment","Votre commentaire");?>
<?=$l->submit();?>
</form>
</div>

<br>
<br>
<h3>Commentaires :</h3>

<div class="col-sm-8 col-10">
<div class="row">

<div class='col-sm-6 col-6'>orderBy :</div>
  
<div class="col-sm-2 col-4">
<select ng-model='select'>
   <option value="+date">oldest</option>   
   <option value="-date" selected>newest</option>   
</select>
</div>
</div>

<br>

    <div ng-init='users=<?=$com?>'>
        <div ng-repeat='user in users|orderBy:select'>
           <b>{{user.name}}:</b>
  <div class="col">
  <div class="row">
      <div class="col-sm-6 col-6">
      {{user.content}}
</div>

   <div class="col-sm-2 col-2">
   <?php if(isset($_COOKIE['auth'])) :?>
    <form method="post" action="#" onclick="return confirm('Voulez Vous Supprimer le commentaire ?');">
    <input type="hidden" name="delete_comment" value="{{user.id}}">
    <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
    </form>
     <?php endif;?>
   </div>
</div>
</div>
<br>
 </div>
   </div>
</div>