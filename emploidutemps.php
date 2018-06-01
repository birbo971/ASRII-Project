<?php
$etudiant ='active';
$titre ="Emploi du temps";
include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php
ifIsConnected();
?>
<div class="container">
  <h1>Emploi du temps</h1>
    <hr>
    <br/>
    <?php edtEtudiant(); ?>
</div>
<?php include("includes/footer.php"); ?>
