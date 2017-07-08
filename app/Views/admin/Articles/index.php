<h1><em>Administrer Les Article</em></h1><br>

  <a href="index.php?p=admin.articles.add" class="btn btn-outline-success">Ajouter des nouveau articles</a><br><br>
<div class="table-responsive">
 
   <table class="table table-hover table-bordered">

        <thead class="thead-inverse">

          <td class="text-center"><b>id</b></td>
          <td class="text-center"><b>Categorie</b</td>
          <td class="text-center"><b>titre</b</td>
          <td class="text-center"><b>action</b</td>

        </thead>

       <tbody>

        <?php foreach ($articles as $article):?>

           <tr>
              <td class="text-center"><?= $article->id ?></td>
              <td><?= $article->categorie ?></td>
              <td><?= $article->titre ?></td>
              <td class="text-center">
                <a href="index.php?p=admin.articles.edit&id=<?= $article->id ?>" class="btn btn-outline-warning">Editer</a>
               <form method="post" action="index.php?p=admin.articles.delete"  style="display:inline-block" onclick="return confirm('Voulez Vous Supprimer l\'article ?');">
                 <input type="hidden" name="id" value="<?= $article->id ?>">
                 <button type="submit" class="btn btn-outline-danger">Supprimer</button>
               </form>
              </td>
           </tr>

       <?php endforeach;?>

       </tbody>

   </table>
        <br>
       <ul class="pagination justify-content-center">
         
        <?php for($i=0;$i<$nbpage;$i++) :?>
           <li class="page-item"><a  class="page-link" href="index.php?p=admin.articles.index&n=<?=$i;?>"> <?=$i+1?> </a></li>
        <?php endfor;?>
       </ul>

      </div>

</div>