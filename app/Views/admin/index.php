<?php 
med\app\App::getInstance()->titre='Accueil Administration';
?>
<h1> Accueil</h1>
<br>
<div class="row admin">

     <div class="col-sm-4 col-6" >
        <a href="index.php">
          <img src="img/admin/home.png"  width="50%">
          <h2>Page d'accueil</h2>
        </a>
     </div>

     <div class="col-sm-4 col-6" >
        <a href="index.php?p=admin.categories.index">
         <img src="img/admin/categories.ico"  width="50%">
          <h2>Edit Categories</h2>
        </a>
     </div>

     <div class="col-sm-4 col-6" >
        <a href="index.php?p=admin.articles.index">
          <img src="img/admin/articles.png"  width="50%">
          <h2>Edit Articles</h2>
        </a>
     </div>

</div>