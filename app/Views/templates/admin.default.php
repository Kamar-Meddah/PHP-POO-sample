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

<body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-inverse"style="background-color:black;">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <a class="navbar-brand" href="index.php?p=articles.index"><em><b class="blue">Blog</b></em></a>
            <div class="collapse navbar-collapse text-right" id="navbarExample">
                <ul class="navbar-nav ml-auto " role="toolbar">
                    <li class="nav-item active">
                        <a class="btn outline-blue blue"href="index.php?p=admin.home.index">Administration <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                             <button type="button" class="btn outline-blue blue dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Edit</button>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                               <a class="dropdown-item" href="index.php?p=admin.categories.index">Categories</a>
                               <a class="dropdown-item" href="index.php?p=admin.articles.index">Articles</a>
                             </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                             <button type="button" class="btn  outline-blue blue dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Compte</button>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                               <a class="dropdown-item" href="index.php?p=admin.users.changeusername">Change username</a>
                               <a class="dropdown-item" href="index.php?p=admin.users.changepass">Changer Mots de passe</a>
                               <a class="dropdown-item" href="index.php?p=users.logout">Déconnecter</a>
                             </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<!-- Page Content -->
<div class="container">
       <?=\med\app\App::getInstance()->getflash()->getFlash();?>
     <?= $content?>
          <br><br>
	</div>


<!-- jQuery Version 3.1.1 -->
<script src="js/jquery.js"></script>

<!-- Tether -->
<script src="js/tether.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<script src="js/tinymce/tinymce.min.js"></script>

<script>tinymce.init({
  selector: 'textarea',
  menubar: true,
  height:300,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
});</script>

</body>

</html>