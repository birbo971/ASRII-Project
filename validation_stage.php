<?php
$titre="Valider les stages";
 require('/includes/Ajouter_projet.php');
  include('/includes/header.php');
  include('includes/navbar.php');
  if($_POST){
    if(!empty($_POST['hidden']) && !empty($_POST['hidden2'])){
         Ajouter_projet::modifier_etat_stage($_POST['hidden'], $_POST['hidden2']);
    }
}
 ?>

<style>
.margin-centrer{
  margin:auto;
  display:table;
}
.erreur{
  border:1px solid red;
}

div.bordure-horizontal {
margin:10px;
border-top: 1px solid #00B2CC;
}
.erreur-haut{

  padding:2px 2px 0 2px;
  border:2px solid red;
  -webkit-border-radius: 15px;
  -moz-border-radius: 15px;
  border-radius: 15px;
}
.color-blue{
color:#00B2CC;
}
</style>
<?php $test = Ajouter_projet::get_all_Stage(); ?>
<div class="container">
  <h1>Les Stages</h1>

    <hr>
    <br/>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <?php
	echo'<table class="table table-bordered">';
      echo'<thead class="thead-dark">';
      echo'<tr><th>Titre</th>';
      echo'<th>Description</th>';
      echo'<th style="width: 200px;">Etat</th></tr>';
      echo'</thead><tbody>';
    while ($res = $test->fetch()){
      $etat = $res['etat'];
      ?>
      <tr>
      <td><?= $res['titre'] ?></td>
        <td><?= $res['description'] ?></td>
      <td>
      <select id="monselect" onchange="test(<?= $res['id'] ?>,this)" name="select[]"  class="form-control" >
          <option value="en attente" <?= $etat == "en attente"? "selected": ""; ?> >En attente</option>
          <option value="valide" <?= $etat == "valide" ? "selected": ""; ?> >validé</option>
          <option value="refuse" <?= $etat == "refuse"? "selected": ""; ?> >refusé</option>
      </select>
      </td>

      </tr> <?php

    }
	echo'</tbody></table>';
	?>
  <input type="hidden" value="" name="hidden" id="hidden" >
  <input type="hidden" value="" name="hidden2" id="hidden2" >
    </form>
    <?php
    if( $_POST){
        echo '<div class="col-sm-8 text-center contentcenter"><div class="alert alert-success" role="alert">
        L\'etat à bien été modifié.
    </div></div>';
    }

?>
  <hr>
</div>



<?php  include('includes/footer.php'); ?>
<script>
function test(id,test){
    $('#hidden').val(id);
    $('#hidden2').val(test.value);
    $("form").submit();
}


</script>
