<?php
$etudiant ='active';
$titre ="Espace Etudiant";
include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php
ifIsConnected();
?>
<div class="container center">
  <h1>Espace Etudiant</h1>
  <hr>
  <h2>Notes <i class="fas fa-edit"></i></h2>
  <hr class="hrmoyen"/>
  <ul>
    <li>
      <a href="notes.php">Acceder à ses notes.</a>
    </li>
  </ul>
  <h2>Emploi du temps <i class="fas fa-newspaper"></i></h2>
  <hr class="hrmoyen"/>
  <ul>
    <li>
      <a href="emploidutemps.php">Acceder à l'emploi du temps.</a>
    </li>
  </ul>
  <h2>Projets tuteurés <i class="fas fa-clipboard"></i></h2>
  <hr class="hrmoyen"/>
  <ul>
    <li>
      <a href="">Consulter les projets tuteurés disponibles.</a>
    </li>
  </ul>
  <h2>ALternance <i class="fas fa-handshake"></i></h2>
  <hr class="hrmoyen"/>
  <ul>
    <li>
      <a href="">Consulter les offres d'alternances ouvertes à candidature.</a>
    </li>
  </ul>
  <h2>Support de cours <i class="fab fa-leanpub"></i></h2>
  <hr class="hrmoyen"/>
  <ul>
    <li>
      <a href="">Consulter les supports de cours.</a>
    </li>
  </ul>
</div>
<?php include("includes/footer.php"); ?>
