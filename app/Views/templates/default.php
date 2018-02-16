<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= \med\app\App::getInstance()->titre;?></title>


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrapfix.css" rel="stylesheet">
    <link href="css/lightbox.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	
		<!--icon-->
      <link rel="icon" href="img/icons/1.ico">

      <script defer src="js/turbolinks.js" data-turbolinks-eval="false"></script>
<script defer src="js/jquery.js" data-turbolinks-eval="false"></script>
<script defer src="js/tether.min.js" data-turbolinks-eval="false"></script>
<script defer src="js/bootstrap.min.js" data-turbolinks-eval="false"></script>


</head>

<body>

<?php if(isset($_COOKIE['auth'])) :?>
<nav class="navbar fixed-top navbar-toggleable-md navbar-inverse"style="background-color:black;">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <a class="navbar-brand" href="?p=articles.index"><em><b class="blue">Blog</b></em></a>
            <div class="collapse navbar-collapse text-right" id="navbarExample">
                <ul class="navbar-nav ml-auto " role="toolbar">
                    <li class="nav-item active">
                        <a class="btn outline-blue blue"href="?p=admin.home.index">Administration <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                             <button type="button" class="btn outline-blue blue dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Edit</button>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                               <a class="dropdown-item" href="?p=admin.categories.index">Categories</a>
                               <a class="dropdown-item" href="?p=admin.articles.index">Articles</a>
                             </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                             <button type="button" class="btn  outline-blue blue dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Compte</button>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                               <a class="dropdown-item" href="?p=admin.users.changeusername">Change username</a>
                               <a class="dropdown-item" href="?p=admin.users.changepass">Changer Mots de passe</a>
                               <a class="dropdown-item" href="?p=users.logout">Déconnecter</a>
                             </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<?php endif;?>

<?php if(!isset($_COOKIE['auth'])) :?>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-inverse" style="background-color:black;">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <div class="dropdown navbar-brand">
                <a class="dropdown-toggle blue" style="color: darkcyan;" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="?p=users.login">Login</a>
                </div>
            </div>
            <a class="navbar-brand" href="?p=articles.index"><em><b class="blue">Blog</b></em></a>
            <div class="collapse navbar-collapse text-right" id="navbarExample" style="overflow:hidden;">
                <ul class="navbar-nav ml-auto " role="toolbar">
                    <li class="nav-item" >
                      <form class="form-inline"id="F" onSubmit="Turbolinks.visit('?search='+document.getElementsByName('search')[0].value);return false;">
                       <div class="input-group admin">
                       <input type="hidden" name="p" value="articles.index">
                          <input style="box-shadow:0px 0px 0px 0px;" id="search" class="form-control control" name="search" type="text" placeholder="Search" value="<?= isset($_GET['search']) ? $_GET['search'] : ''?>" required>
                          <button id="button" class="btn btn-sm" type="submit"><img src="<?=ROOT.'img/icons/search.svg'?>" width="20px" height="20px"></button>
                       </div>
                      </form>
                    
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <?php endif;?>
<!-- Page Content -->
<div class="container">
    <?=\med\app\App::getInstance()->getflash()->getFlash();?>
     <?= $content;?>
     <br><br>
</div>

</body>

</html>