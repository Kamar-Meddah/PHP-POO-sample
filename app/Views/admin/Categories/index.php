<h1><em>Administrer Les categorie</em></h1><br>

  <a href="index.php?p=admin.categories.add" class="btn btn-outline-success">Ajouter des nouveau categories</a><br><br>
<div class="table-responsive">
 
   <table class="table table-hover table-bordered">

        <thead class="thead-inverse">

          <td class="text-center"><b>id</b></td>
          <td class="text-center"><b>titre</b</td>
          <td class="text-center"><b>action</b</td>

        </thead>

       <tbody>

        <?php foreach ($categories as $categorie):?>

           <tr>
              <td class="text-center"><?= $categorie->id ?></td>
              <td><?= $categorie->titre ?></td>
              <td class="text-center">
                <a href="index.php?p=admin.categories.edit&id=<?= $categorie->id ?>" class="btn btn-outline-warning">Editer</a>
               <form method="post" action="?p=admin.categories.delete"  style="display:inline-block" onclick="return confirm('Voulez Vous Supprimer l\'categorie ?');">
                 <input type="hidden" name="id" value="<?= $categorie->id ?>">
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
         <li class="page-item"><a  class="page-link" href="index.php?p=admin.categories.index&n=<?=$i?>"> <?=$i+1?> </a></li>
        <?php endfor;?>
      </ul>

      </div>

</div>