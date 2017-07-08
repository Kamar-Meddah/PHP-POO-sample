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
    <link href="css/style.css" rel="stylesheet">
	
		<!--icon-->
      <link rel="icon" href="img/icons/1.ico">
</head>

<body ng-app>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-inverse" style="background-color:black;">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <div class="dropdown navbar-brand">
                <a class="dropdown-toggle blue" style="color: darkcyan;" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="index.php?p=users.login">Login</a>
                </div>
            </div>
            <a class="navbar-brand" href="index.php?p=articles.index"><em><b class="blue">Blog</b></em></a>
            <div class="collapse navbar-collapse text-right" id="navbarExample" style="overflow:hidden;">
                <ul class="navbar-nav ml-auto " role="toolbar">
                    <li class="nav-item" >
                      <form class="form-inline" method="get" action="" id="F" >
                       <div class="input-group admin">
                          <input style="box-shadow:0px 0px 0px 0px;" id="search" class="form-control control" name="search" type="text" placeholder="Search" value="<?= isset($_GET['search']) ? $_GET['search'] : ''?>" required>
                          <button id="button" class="btn btn-sm" type="submit"><img src="img/icons/search.svg" width="20px" height="20px"></button>
                       </div>
                      </form>
                    
                    </li>

                </ul>
            </div>
        </div>
    </nav>

<!-- Page Content -->
<div class="container">
    <?=\med\app\App::getInstance()->getflash()->getFlash();?>
     <?= $content;?>
     <br><br>
</div>



<!-- jQuery Version 3.1.1 -->
<script src="js/jquery.js"></script>

<!-- Tether -->
<script src="js/angular.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>