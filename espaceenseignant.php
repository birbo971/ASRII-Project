<?php
$enseignant ='active';
$titre ="Espace Enseignant";
?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php
ifIsConnected();
?>
<!--Content-->
<div class="container">
  <h1>Espace Enseignant</h1>
  <hr>
  <h2 class="center">Notes <i class="fas fa-edit"></i></h2>
  <hr class="hrmoyen"/>
  <ul>
    <li>
      <a href="">Ajouter une note.</a>
    </li>
    <li>
      <a href="">Consulter ses notes déposées.</a>
    </li>
  </ul>
  <h2 class="center">Emploi du temp personnel <i class="fas fa-newspaper"></i></h2>
  <hr class="hrmoyen"/>
  <ul>
    <li>
      <a href="">Acceder à l'emploi du temps personnel.</a>
    </li>
  </ul>
  <h2 class="center">Support de cours <i class="fas fa-copy"></i></h2>
  <hr class="hrmoyen"/>
  <ul>
    <li>
      <a href="">Ajouter un support de cours.</a>
    </li>
    <li>
      <a href="">Consulter ses supports de cours.</a>
    </li>
  </ul>
</div>


<?php include("includes/footer.php"); ?>
