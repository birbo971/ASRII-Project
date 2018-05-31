<?php
session_start();

function barMenu(){
session_unset();
if(empty($_SESSION['NouvelleSession'])){
  $etudiant = "active";
?>
  <li class="nav-item"><a class="nav-link <?= isset($etudiant)? $etudiant: ''; ?>" href="authespaceetudiant.php">Espace Etudiant</a></li>
<?php
}else{
?>
  <li class="nav-item dropdown <?= isset($etudiant)? $etudiant: ''; ?>">
    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Espace étudiant
    </a>
    <div class="dropdown-menu dropright" aria-labelledby="navbarDropdownMenuLink">
      <a class="dropdown-item" href="#">
        Notes
      </a>
      <a class="dropdown-item" href="#">
        Emploi du temps
      </a>
      <a class="dropdown-item" href="#">
        Projets tuteurés
      </a>
      <a class="dropdown-item" href="#">
        Offres d/alternance</a>
      <a class="dropdown-item" href="#">
        Support de cours
      </a>
    </div>
  </li>
<?php
  }
}

include('includes/DB.php');
function connexionEspaceEtud(){
  $pdo = DB::get();
  if(isset($_POST['connexion'])){
      if(!empty($_POST['emailEtudiant']) && !empty($_POST['motdepasseEtudiant'])){
      $Email_Etudiant = $_POST['emailEtudiant'];
      $Motdepasse_Etudiant = $_POST['motdepasseEtudiant'];
      $req = $pdo->prepare("SELECT * FROM `etudiant` WHERE  email=:emailEtudiant AND mdp=:motdepasseEtudiant");
      $req->execute(array(':emailEtudiant'=>$Email_Etudiant,
                          ':motdepasseEtudiant'=>$Motdepasse_Etudiant));
      $nb = $req->rowCount();
                      if($nb!=0){  echo'<br/><div class="col-sm-8 text-center contentcenter"><div class="alert alert-success" role="alert">
                        Vous avez bien été connecter ! Vous allez être rediriger dans 3 secondes.
                    </div></div>';
                    $_SESSION['NouvelleSession'] = $Email_Etudiant;
                  }else{
                    echo"<br/><div class='col-sm-8 text-center contentcenter'><div class='alert alert-warning' role='alert'>
                      Vous n'existez pas dans la base !
                  </div></div>";
                  }
                }else{
      echo'<br/><div class="col-sm-8 text-center contentcenter"><div class="alert alert-danger" role="alert">
    Tout les champs dovent etre remplis !
</div></div>';
    }
  }
}

?>
