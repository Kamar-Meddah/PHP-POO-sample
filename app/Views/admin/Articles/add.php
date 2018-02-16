<h1><em>Editez vos articles</em></h1><br>

<form method="post" action="#" enctype="multipart/form-data">
  <div class="row">
    <div class="col-sm-8 col-10">
         <?= $l->input('titre','Titre'); ?>
         <?= $l->textarea('contenu','Contenu',"tex"); ?>
         <?= $l->select("category_id","Catégorie",$categories); ?>
        <div class="text-right">
            <br>
            <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
        </div>
    </div>

    <div class="col-sm-4 col-2">

        <label class="custom-file">
         <input type="file" name="images[]" class="btn btn-primary" multiple  accept=".jpg, .jpeg, .png">
        </label>
    </div>
  </div>

</form>


<script src="js/tinymce/tinymce.min.js" ></script>
<script src="js/app.js"></script>