<?php
session_start();
function barMenu(){
session_unset();
if(empty($_SESSION['NouvelleSession'])){
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
function connexionEspaceEtud(){
  if(isset($_POST['connexion'])){
      $Email_Etudiant = $_POST['emailEtudiant'];
      $Motdepasse_Etudiant = $_POST['motdepasseEtudiant'];
      
  }
}
?>
