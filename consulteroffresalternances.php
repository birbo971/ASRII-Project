<?php
$titre="Consulter une offres d'alternance";
  include('/includes/header.php');
  include('includes/navbar.php');
 ?>
<?php $consultation = consultOffresAlternances(); ?>
<div class="container">
  <h1>Les offres d'alternances</h1>

    <hr>
    <br/>

    <?php
	echo'<table class="table table-bordered">';
      echo'<thead class="thead-dark">';
      echo'<tr><th>Titre</th>';
      echo'<th>Description</th>';
      echo'<th>Experience Requise</th>';
      echo'</thead><tbody>';
    while ($res = $consultation->fetch()){

      echo'<tr><td>'.$res['titre'].'</td><td>'.$res['description'].'</td><td>'.$res['experience'].' Mois </td></tr>';

    }
	echo'</tbody></table>';
	?>

</div>
<?php
include('includes/footer.php');
?>
