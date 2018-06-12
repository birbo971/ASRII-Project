<?php
$titre="Consulter ses projets tuteurés";
 require('/includes/Ajouter_projet.php');
  include('/includes/header.php');
  include('includes/navbar.php');
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
<?php $test = Ajouter_projet::getProjetEntreprise($_SESSION['id']); ?>
<div class="container">
  <h1>Vos projets</h1>

    <hr>
    <br/>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <?php

	echo'<table class="table table-bordered">';
      echo'<thead class="thead-dark">';
      echo'<tr><th>Titre</th>';
      echo'<th>Description</th>';
      echo'<th>Etat</th></tr>';
      echo'</thead><tbody>';
    while ($res = $test->fetch()){
$id = $res['id'];
      echo'<tr><td><input onchange="test(titre,$id,this)" type="text" value="'.$res['titre'].'" name="titre[]"  ></td><td><input type="text" value="'.$res['description'].'" name="desc[]"</td><td>'.$res['etat'].'</td></tr>';

    }
	echo'</tbody></table>';
	?>
  <hr>
  <input type="hidden" value="" name="type" id="hidden" >
  <input type="hidden" value="" name="titre" id="hidden2" >
  <input type="hidden" value="" name="id" id="hidden3" >
  </form>
  <?php
    if( $_POST){
        echo '<div class="col-sm-8 text-center contentcenter"><div class="alert alert-success" role="alert">
        L\'etat à bien été modifié.
    </div></div>';
    }

?>
</div>



<?php  include('includes/footer.php'); ?>
<script>
function test(id,test){
    $('#hidden').val(type);
    $('#hidden2').val(id);
    $('#hidden23').val(test.value);
//    $("form").submit();
}


</script>
