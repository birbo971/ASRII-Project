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
        Offres d'alternance</a>
      <a class="dropdown-item" href="consultersonsupport.php">
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
        <a class="dropdown-item" href="espaceenseignant.php">
          Mon Espace
          </a>
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
            <a class="dropdown-item" href="notes.php">
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
          <a class="dropdown-item" href=addsupportcours.php>
            Ajouter un support de cours
          </a>
          <a class="dropdown-item" href="consultersonsupport.php">
            Consulter ses supports de cours
          </a>
        </ul>
      </li>
    </ul>
  </li>

    <?php


  }
if( $etat == 'personnel miaw'){ ?>
  <li class="nav-item dropdown <?= isset($enseignant)? $enseignant: ''; ?>">
    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      admin
    </a>
    <ul class="dropdown-menu dropright" aria-labelledby="navbarDropdownMenuLink">
      <li>
        <a class="dropdown-item dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Validations
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li>
            <a class="dropdown-item" href="validation_projet.php">
              Valider les projets
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="validation_stage.php">
              Valider les stages
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a class="dropdown-item" href="ajout_membre.php">
          Ajouter un utilisateur
        </a>
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
  if (isset ($_GET["date"])) {
    $date = $_GET["date"];
    $time = strtotime($_GET["date"]);
    $day = date("N", $time) - 1;
  }
  else {
    $date = date("Y-m-d");
    $day = date("N") - 1;
  }
  // echo date('Y-m-d',strtotime($date. '-1 day'));
  $debutSemaine = date('Y-m-d',strtotime($date. '-' . $day . ' day'));
  $finSemaine = date('Y-m-d',strtotime($debutSemaine. '+6 day'));
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

  echo "<h2 class='text-center'><a href='" . $_SERVER['PHP_SELF'] . "?date=" . date('Y-m-d', strtotime($debutSemaine. '-7 day')) . "' class='btn btn-left'><i class='fas fa-arrow-left'></i></a>
        Semaine du " . $debutSemaine . " au " . $finSemaine . "
        <a href='" . $_SERVER['PHP_SELF'] . "?date=" . date('Y-m-d', strtotime($debutSemaine. '+7 day')) . "' class='btn btn-left'><i class='fas fa-arrow-right'></i></a></h2>  ";
    if($res > 0) {
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
      // while( $row = $req->fetch()){
      //   if ($row['date_horaire'] == $debutSemaine) {
      //     if ($row['plage_horaire'] == "matin") {
      //       echo "<tr><td><small>09h00</small><br><small>13h00</small></td>";
      //     }
      //     else {
      //       echo "<tr><td><small>14h00</small><br><small>18h00</small></td>";
      //     }
      //   }
      //   echo'<td> Matière : ' .$row['matieres'] . '<br>Professeur : ' . $row['nom'].'</td>';
      //   if ($row['date_horaire'] == $semaine[4]) {
      //     echo "</tr>";
      //   }
      // }
      $i = 0;
      $row = $req->fetch();
      while ($i <= 9) {
        if ($i == 0) {
          echo "<tr><td><small>09h00</small><br><small>13h00</small></td>";
        }
        if ($i == 5) {
          echo "<tr><td><small>14h00</small><br><small>18h00</small></td>";
        }
        if ($semaine[$i % 5] == $row['date_horaire']) {
          echo'<td> Matière : ' .$row['matieres'] . '<br>Professeur : ' . $row['nom'].'</td>';
          $row = $req->fetch();
        }
        else {
          echo'<td> Aucun cours </td>';
        }
        if ($i == 4 || $i == 9) {
          echo "</tr>";
        }
        $i++;
      }
      echo'</tbody></table>';
  }
  else{
    echo'<div class="alert alert-info" role="alert">Aucun emploi du temps n\'est enregistré dans la base pour cette semaine !</div>';
  }
}

function edtEnseignant(){
  date_default_timezone_set('Europe/Paris');
  if (isset ($_GET["date"])) {
    $date = $_GET["date"];
    $time = strtotime($_GET["date"]);
    $day = date("N", $time) - 1;
  }
  else {
    $date = date("Y-m-d");
    $day = date("N") - 1;
  }
  // echo date('Y-m-d',strtotime($date. '-1 day'));
  $debutSemaine = date('Y-m-d',strtotime($date. '-' . $day . ' day'));
  $finSemaine = date('Y-m-d',strtotime($debutSemaine. '+6 day'));
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
  AND utilisateurs.id_users = " . $_SESSION['id'] . "
  AND date_horaire IN ('". $semaine[0]  . "', '" . $semaine[1] . "', '" . $semaine[2] . "', '" . $semaine[3] . "', '" . $semaine[4] . "')
  ORDER BY plage_horaire, date_horaire;");
  $req->execute();
  $res = $req->rowCount();

  echo "<h2 class='text-center'><a href='" . $_SERVER['PHP_SELF'] . "?date=" . date('Y-m-d', strtotime($debutSemaine. '-7 day')) . "' class='btn btn-left'><i class='fas fa-arrow-left'></i></a>
        Semaine du " . $debutSemaine . " au " . $finSemaine . "
        <a href='" . $_SERVER['PHP_SELF'] . "?date=" . date('Y-m-d', strtotime($debutSemaine. '+7 day')) . "' class='btn btn-left'><i class='fas fa-arrow-right'></i></a></h2>  ";
    if($res > 0) {
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
      // while( $row = $req->fetch()){
      $i = 0;
      $row = $req->fetch();
      while ($i <= 9) {
        if ($i == 0) {
          echo "<tr><td><small>09h00</small><br><small>13h00</small></td>";
        }
        if ($i == 5) {
          echo "<tr><td><small>14h00</small><br><small>18h00</small></td>";
        }
        if ($semaine[$i % 5] == $row['date_horaire']) {
          echo'<td> Matière : ' .$row['matieres'] . '<br>Professeur : ' . $row['nom'].'</td>';
          $row = $req->fetch();
        }
        else {
          echo'<td> Aucun cours </td>';
        }
        if ($i == 4 || $i == 9) {
          echo "</tr>";
        }
        $i++;
      }
      // $row = $req->fetch();
      // print_r ($row);
      // $row = $req->fetch();
      // print_r ($row);
      echo'</tbody></table>';
  }
  else{
    echo'<div class="alert alert-info" role="alert">Aucun emploi du temps n\'est enregistré dans la base pour cette semaine !</div>';
  }
}

function recupereMatiere(){
  $pdo = DB::get();
  $req = $pdo->prepare("SELECT * FROM matieres WHERE matieres.id_ens = ".$_SESSION['id']."");
  $req->execute();
  $nb = $req->rowCount();
  if($nb > 0){
    while ($row =$req->fetch()) {
      echo'<option>'.$row['matieres'].'</option>';
    }
  }else{
    echo'<option>Aucune valeur</option>';
  }
}
function recupereEtudiant(){
    $pdo = DB::get();
    $req = $pdo->prepare("SELECT id_users,nom,prenom FROM utilisateurs WHERE etat = 'etudiant' ");
    $req->execute();
    $nb = $req->rowCount();
  if($nb > 0){
    while ($row = $req->fetch()) {
      echo'<option value='.$row['id_users'].'>'.$row['nom'].' '.$row['prenom'].'</option>';
    }
  }else{
    echo'<option>Aucune valeur</option>';
  }
}
function insertionNotes(){
  if(isset($_POST['enregistre'])){
    if(!empty($_POST['notes'])){
      $notes = $_POST['notes'];
      $etudiant = $_POST['etudiant'];
      $pdo = DB::get();
      $req = $pdo->prepare("INSERT INTO notes(notes,id_enseignant,id_etudiant) VALUES(:notes,:id_enseignant,:id_etudiant)");
      $req->execute(array(":notes"=>$notes,
                          ":id_enseignant"=>$_SESSION['id'],
                          ":id_etudiant"=>$etudiant));
      $res = $req->rowCount();
      if($res > 0){
        echo'<br/><div class="col-sm-8 text-center contentcenter"><div class="alert alert-success" role="alert">
        Valeurs bien ajoutées dans la base de données.</div></div>';?>
        <script type='text/javascript'>
        window.setTimeout('location=("espaceenseignant.php");',2000);
        </script>
        <?php
      }else{
        echo'Aucune valeur ajoutées.';
      }
    }else{
      echo'<br/><div class="col-sm-8 text-center contentcenter"><div class="alert alert-danger" role="alert">
      Erreur ! tous les champs ne sont pas remplies.</div></div>';
    }
  }
}
function notesEnseignant(){
  $pdo= DB::get();
  $req = $pdo->prepare('SELECT id_notes,nom,prenom, notes, matieres FROM notes JOIN utilisateurs on notes.id_etudiant = utilisateurs.id_users JOIN matieres on matieres.id_ens=notes.id_enseignant WHERE id_enseignant ='.$_SESSION['id'].' and id_ens ='.$_SESSION['id'].'');
  $req->execute();
  $nb = $req->rowCount();
  //tableaux des notes
  if($nb > 0){
  echo'<table class="table">';
  echo'<tr><th>Matière</th>
      <th>Notes</th>
      <th>Etudiants</th>';
  while($row = $req->fetch()){
      echo'<tr><td>'.$row['matieres'].'</td><td  class="test" ><input type="text" id="'.$row['id_notes'].'"class="test form-control" style="width:50%;" value="'.$row['notes'].'" ></td><td>'.$row['nom'].' '.$row['prenom'].'</td></tr>';
  }
      echo'</table>';
  }else{
    echo"<div class='alert alert-info'>Aucune notes dans la base.</div>";
  }
}
function updateNotes($notes,$id){
  $pdo = DB::get();
  $req = $pdo->prepare('UPDATE notes SET notes =:notes WHERE id_notes ='.$id.'');
  $req->execute(array('notes'=>$notes));
  $res = $req->rowCount();
  if($res > 0){
    echo'<div class="alert alert-success">Notes enregistrée.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
  }else{
      echo'<div class="alert alert-success">Notes Non enregistrée.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
  }
}
function addSupportCours(){
$pdo = DB::get();
if(isset($_POST['btn-upload']))
  {
  if(!empty($_FILES['fichier']['name'])){
 $file = $_FILES['fichier']['name'];
 $file_loc = $_FILES['fichier']['tmp_name'];
 $file_size = $_FILES['fichier']['size'];
 $file_type = $_FILES['fichier']['type'];
 $id = $_SESSION['id'];
 $folder = "uploads/";
 move_uploaded_file($file_loc,$folder.$file);
 $sql = $pdo->prepare("INSERT INTO upload(filename,filesize,fileUrl,ens_id) VALUES('$file','$file_size','$folder$file','$id')");
 $sql->execute();
 $row = $sql->rowCount();
     if($row > 0){
       echo"<div class='alert alert-success'>Vous avez bien importer votre fichier</div>";
     }else{
       echo'<div class="alert alert-danger">Echec de l\'importation !</div>';
     }
   }else{
     echo'<div class="alert alert-danger">Echec de l\'insertion!</div>';

   }
  }

}
function consultSupportCours(){
  $pdo = DB::get();
  $req = $pdo->prepare("SELECT filename,filesize,fileUrl FROM upload WHERE ens_id =".$_SESSION['id']."");
  $req->execute();
  return $req;
}
function consultAllSupportCours(){
  $pdo = DB::get();
  $req = $pdo->prepare("SELECT * FROM `upload` join matieres on upload.ens_id = matieres.id_ens");
  $req->execute();
  return $req;
}
?>
