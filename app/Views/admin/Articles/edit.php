<h1><em>Editez vos articles</em></h1><br>

<form method="post" action="#" enctype="multipart/form-data">
  <div class="row">
    <div class="col-sm-8 col-10">
         <?= $l->input('titre','Titre'); ?>
         <?= $l->textarea('contenu','Contenu'); ?>
         <?= $l->select("category_id","Catégorie",$categories); ?>
        <div class="text-right">
            <br>
            <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
        </div>
    </div>

    <div class="col-sm-4 col-2">

        <label class="custom-file">
         <input type="file" name="images[]" class="btn btn-outline-primary btn-sm" multiple>
         
        </label>       
        <br><br>
     <?php foreach($images as $image):?>
      <p>
            <a href="index.php?p=admin.articles.edit&id=<?=$image->articles_id?>&delete_image=<?=$image->id?>"  onclick="return confirm('Voulez Vous Supprimer l\'image ?');"><img src= 'img/articles/<?= $image->name ?>'  width="250"></a>
      </p>
      
      <?php endforeach; ?>



    </div>
  </div>

</form>



