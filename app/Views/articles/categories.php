<?php
\med\app\App::getInstance()->titre=$categorie->titre;
?>

<h1><em><?=$categorie->titre;?></em></h1>
<br>
<div class="row">
    <div class="col-sm-9 col-10">
        <?php foreach ($article as $post):?>

            <h2><a href="<?=$post->url?>"><?=$post->titre?></a></h2>
            <p><em><?= $post->categorie?></em></p>
            <p><?=$post->extrait;?></p>
            <hr>

        <?php endforeach;?>

        <br>
      <ul class="pagination justify-content-center">
        <?php for($i=0;$i<$nbpage;$i++) :?>
          <li class="page-item">  <a class="page-link"  href="index.php?p=articles.categories&id=<?=$categorie->id?>&n=<?=$i?>"> <?=$i+1?> </a></li>
        <?php endfor;?>
        </ul>
      

   </div>

    <div class="col-sm-3 col-2 ">
       
        <ul >
             <h2><em>Categories</em></h2>
            <?php foreach ($categories as $category):?>

               <li class='list-unstyled'><a href="<?=$category->url?>"><?=$category->titre?></a></li>

            <?php endforeach;?>
        </ul>
    </div>

</div>

