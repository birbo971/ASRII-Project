<?php
$titre="Consulter une offres d'alternance";
  include('/includes/header.php');
  include('includes/navbar.php');
 ?>
<?php $consultation = consultOffresAlternances(); ?>
<div class="container">
  <h1>Les offres d'alternances</h1>

    <hr>
    <div class="row">

    <?php
	// echo'<table class="table table-bordered">';
  //     echo'<thead class="thead-dark">';
  //     echo'<tr><th>Titre</th>';
  //     echo'<th>Description</th>';
  //     echo'<th>Experience Requise</th>';
  //     echo'</thead><tbody>';
    while ($res = $consultation->fetch()){
      // echo'<tr><td>'.$res['titre'].'</td><td>'.$res['description'].'</td><td>'.$res['experience'].' Mois </td></tr>';
      echo '<div class="col-md-6 col-sm-12 center">
              <h2>' . $res['titre'] . '</h2>
              <hr class="hrmoyen"/>
              <p>' . $res['description'] . '</p>
              <p class="lead">Experience requise : ' . $res['experience'] . ' Mois</p>
              <p class="lead">Contact : <a href="mailto:' . $res['email'] . '">' . $res['email'] . '</a></p>
            </div>';
    }
	// echo'</tbody></table>';
	?>
</div>
</div>
<?php
include('includes/footer.php');
?>
