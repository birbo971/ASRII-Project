<?php
session_start();
function barMenu($etat){
if(empty($_SESSION['NouvelleSession'])){ ?>
  <li class="nav-item dropdown <?= isset($authentification)? $authentification: ''; ?>">
    <a class="nav-link" href="authentification.php">Connexion</a>
    </li>
<?php
}else{

  if($etat == 'etudiant'  or $etat == 'personnel miaw'){

?>
  <li class="nav-item dropdown <?= isset($etudiant)? $etudiant: ''; ?>">
    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Espace étudiant
    </a>
    <div class="dropdown-menu dropright" aria-labelledby="navbarDropdownMenuLink">
      <a class="dropdown-item" href="espaceetudiant.php">
        Mon Espace
        </a>
      <a class="dropdown-item" href="notes.php">
        Notes
      </a>
      <a class="dropdown-item" href="emploidutemps.php">
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

}if ($etat == 'entreprise'  or $etat == 'personnel miaw') { ?>


      <li class="nav-item dropdown <?= isset($entreprise)? $entreprise: ''; ?>">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Espace entreprise
        </a>
        <div class="dropdown-menu dropright" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Projet tuteuré
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="add_projet_tut.php">
              Ajouter un projet tuteuré
            </a>
            <a class="dropdown-item" href="consulter_ses_projet.php">
              Consulter ses projets tuteurés
            </a>
          </div>
          <a class="dropdown-item dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Offre d'alternance
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="add_stage.php">
              Ajouter une offre d'alternance
            </a>
            <a class="dropdown-item" href="consulter_ses_stage.php">
              Consulter ses offres d'alternances
            </a>
          </div>
        </div>
      </li>

<?php
}if($etat == 'enseignant' or $etat == 'personnel miaw'){ ?>
  <li class="nav-item dropdown <?= isset($enseignant)? $enseignant: ''; ?>">
    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Espace enseignant
    </a>
    <ul class="dropdown-menu dropright" aria-labelledby="navbarDropdownMenuLink">
      <li>
        <a class="dropdown-item dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Notes
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li>
            <a class="dropdown-item" href="add_notes.php">
              Ajouter une note
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="#">
              Consulter ses notes déposées
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a class="dropdown-item" href="emploidutemps.php">
          Emploi du temps personnel
        </a>
      </li>
      <li>
        <a class="dropdown-item dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Support de cours
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">
            Ajouter un support de cours
          </a>
          <a class="dropdown-item" href="#">
            Consulter ses supports de cours
          </a>
        </ul>
      </li>
    </ul>
  </li>

    <?php


  }  ?>
    <li>
      <a class="nav-link <?= isset($deconnexion)? $deconnexion: ''; ?>"  href="deconnexion.php">
        Deconnexion
      </a>
    </li>
  <?php
}
}

include('includes/DB.php');
function connexionEspaceEtud(){
  $pdo = DB::get();
  if(isset($_POST['connexion'])){
      if(!empty($_POST['email']) && !empty($_POST['motdepasse'])){
      $Email= $_POST['email'];
      $Motdepasse= $_POST['motdepasse'];
      $req = $pdo->prepare("SELECT * FROM `utilisateurs` WHERE  email=:email AND mdp=:motdepasse");
      $req->execute(array(':email'=>$Email,
                          ':motdepasse'=>$Motdepasse));
      if($nb = $req->fetch()){
        $_SESSION['id'] = $nb['id_users'];
        $_SESSION['NouvelleSession'] = $nb['email'];
        $_SESSION['etat'] = $nb['etat'];
        if($_SESSION['etat'] == 'etudiant'){
        echo'<br/><div class="col-sm-8 text-center contentcenter"><div class="alert alert-success" role="alert">
         Vous avez bien été connecter ! Vous allez être rediriger dans 3 secondes.
     </div></div>';
        ?><script type='text/javascript'>
        window.setTimeout('location=("espaceetudiant.php");',3000);
        </script>
        <?php
        }elseif($_SESSION['etat'] == "enseignant"){
       echo'<br/><div class="col-sm-8 text-center contentcenter"><div class="alert alert-success" role="alert">
        Vous avez bien été connecter ! Vous allez être rediriger dans 3 secondes.
    </div></div>'; ?>
        <script type='text/javascript'>
    window.setTimeout('location=("espaceenseignant.php");',3000);
    </script><?php
     }
        ?>
        <?php
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
function deconnexion(){
  session_unset ();
  session_destroy();
  ?><br/>
  <div class="col-sm-8 text-center contentcenter">
  <div class="alert alert-info" role="alert">
  Vous êtes à présent déconnecté, et serez rediriger dans 2 secondes
  </div>
</div>
  <script type='text/javascript'>
window.setTimeout('location=("authentification.php");',2000);
</script>

<?php
}
function ifIsConnected(){
  if(!empty($_SESSION['etat']) && $_SESSION['etat'] == "enseignant"){
  }elseif(!empty($_SESSION['etat']) && $_SESSION['etat'] == "etudiant"){
  }elseif(!empty($_SESSION['etat']) && $_SESSION['etat'] == "entreprise"){
  }elseif(!empty($_SESSION['etat']) && $_SESSION['etat'] == "personnel miaw") {
  }else{
    header("location:authentification.php");
  }
}
function notesEtudiant(){
  $pdo= DB::get();
  $req = $pdo->prepare('SELECT notes,matieres,nom FROM notes,utilisateurs,matieres WHERE etat = "enseignant"  AND utilisateurs.id_users = notes.id_enseignant AND notes.id_etudiant ='.$_SESSION["id"].' AND  utilisateurs.id_users = matieres.id_ens  ');
  $req->execute();
  $nb = $req->rowCount();
  //tableaux des notes
  if($nb > 0){
  echo'<table class="table">';
  echo'<tr><th>Matière</th>
      <th>Notes</th>
      <th>Enseignants</th>';
  while($row = $req->fetch()){
      echo'<tr><td>'.$row['matieres'].'</td><td>'.$row['notes'].'</td><td>'.$row['nom'].'</td></tr>';
  }
      echo'</table>';
  }else{
    echo"Aucune notes dans la base.";
  }
}
function edtEtudiant(){
  date_default_timezone_set('Europe/Paris');
  $date = date("Y-m-d");
  $day = date("N") - 1;
  // echo date('Y-m-d',strtotime($date. '-1 day'));
  $debutSemaine = date('Y-m-d',strtotime($date. '-' . $day . ' day'));
  $semaine = array();
  array_push($semaine, $debutSemaine);
  array_push($semaine, date('Y-m-d', strtotime($debutSemaine. '+1 day')));
  array_push($semaine, date('Y-m-d', strtotime($debutSemaine. '+2 day')));
  array_push($semaine, date('Y-m-d', strtotime($debutSemaine. '+3 day')));
  array_push($semaine, date('Y-m-d', strtotime($debutSemaine. '+4 day')));
  $pdo = DB::get();
  // $req =$pdo->prepare("SELECT DISTINCT plage_horaire,matieres,nom,id_ens FROM emploi_du_temps,matieres,utilisateurs WHERE utilisateurs.id_users = matieres.id_ens AND emploi_du_temps.id_matieres = utilisateurs.id_users;");
  $req =$pdo->prepare("SELECT DISTINCT plage_horaire,date_horaire,matieres,nom,id_ens FROM emploi_du_temps,matieres,utilisateurs
  WHERE utilisateurs.id_users = matieres.id_ens
  AND emploi_du_temps.id_matieres = utilisateurs.id_users
  AND date_horaire IN ('". $semaine[0]  . "', '" . $semaine[1] . "', '" . $semaine[2] . "', '" . $semaine[3] . "', '" . $semaine[4] . "')
  ORDER BY plage_horaire, date_horaire;");
  $req->execute();
  $res = $req->rowCount();

  if($res > 0){
    ?>
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>Horaires</th>
          <th>Lundi</th>
          <th>Mardi</th>
          <th>Mercredi</th>
          <th>jeudi</th>
          <th>Vendredi</th>
        </tr>
      </thead>
      <tbody>
    <?php
    // echo'<table class="table table-bordered">';
    // echo'<thead class="thead-dark">';
    // echo'<tr><th>Horaires</th>';
    // echo'<th>Lundi</th><th>Mardi</th>
    // <th>Mercredi</th>
    // <th>jeudi</th>
    // <th>Vendredi</th></tr>';
    // echo'</thead><tbody>';
    // echo'<tr><th>9h00</th></tr>';
    // echo'<tr><th>13h00</th></tr>';
    // echo'<tr><th>14h00</th></tr>';
    // echo'<tr><th>18h00</th></tr>';
      while( $row = $req->fetch()){
        if ($row['date_horaire'] == $debutSemaine) {
          echo "<tr><td></td>";
        }
        echo'<td>'.$row['matieres'] ." " . $row['nom'].'</td>';
        if ($row['date_horaire'] == $semaine[4]) {
          echo "</tr>";
        }
      }
      echo'</tbody></table>';
  }else{
    echo'Erreur aucun emploi du temps enregistré dans la base !';
  }
}

?>
