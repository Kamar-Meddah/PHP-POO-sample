<?php 
med\app\App::getInstance()->titre='Accueil';

?>
<h1><em><?=isset($_GET['search']) ? "Search result : ".$_GET['search'] : "Accueil"?></em></h1>
<br>
<div class="row">

    <div class="col-sm-9 col-10">

        <?php foreach ($article as $post):?>

            <h2><a href="<?=$post->url?>"><?=$post->titre?></a></h1>
            <p><em><?= $post->categorie?></em></p>
            <p><?=$post->extrait;?></p>
            <hr>

        <?php endforeach;?>
        <br>
          <ul class="pagination justify-content-center">
        <?php for($i=0;$i<$nbpage;$i++) :?>
         <li class="page-item">  <a class="page-link" href="
           <?= isset($_GET['search']) ?'?search='.$_GET['search'].'& n='.$i : '?p=articles.index&n='.$i ?>
           "> <?=$i+1?> </a></li>
        <?php endfor;?>
      </ul>

    </div>

    <div class="col-sm-3 col-2">

        <ul>
            <h2><em>Categories</em></h2>
            <?php foreach ($categories as $categorie):?>

               <li class='list-unstyled'><a href="<?=$categorie->url?>"><?=$categorie->titre?></a></li>

            <?php endforeach;?>
        </ul>
    </div>

</div>


