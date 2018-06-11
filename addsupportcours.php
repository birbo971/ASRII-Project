<?php
$enseignant ='active';
$titre ="Ajouter un support de cours";
?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php
ifIsConnected();
?>
<?php if($_SESSION['etat'] == "enseignant"){
  ?><!--Content-->
  <div class="container">
    <h1>Ajouter un support de cours</h1>
    <hr/>
    <br/>
     <form class="" action="addsupportcours.php" method="post">
        
     </form>
  </div>
<?php
}
include('includes/footer.php');
 ?>
