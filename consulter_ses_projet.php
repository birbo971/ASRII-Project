<?php
$titre="Ajouter un projet tuteuré";
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
    <?php
    while ($res = $test->fetch()){
      echo'<table class="table table-bordered">';
      echo'<thead class="thead-dark">';
      echo'<tr><th>Titre</th>';
      echo'<th>Description</th>';
      echo'<th>Etat</th></tr>';
      echo'</thead><tbody>';
      echo'<tr><td>'.$res['titre'].'</td><td>'.$res['description'].'</td><td>'.$res['etat'].'</td></tr>';
      echo'</tbody></table>';
    } ?>
  <hr>
</div>



<?php  include('includes/footer.php');
