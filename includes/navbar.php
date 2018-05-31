<nav class="navbar fixed-top navbar-expand-md bg-light navbar-light">
  <div class="container">
    <img src="img/logo.png" alt="logo" class="logo">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">

        <!-- Accueil -->
        <li class="nav-item">
          <a class="nav-link <?= isset($accueil)? $accueil: ''; ?>" href="index.php">
            Accueil
          </a>
        </li>

        <!-- Présentation de la licence -->
        <li class="nav-item dropdown <?= isset($presentation)? $presentation: ''; ?>">
          <a class="nav-link dropdown-toggle " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Présentation de la licence
          </a>
          <div class="dropdown-menu dropright" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="objectifrythmes.php">
              Objectifs et rythme
            </a>
            <a class="dropdown-item" href="lieu.php">
              Lieu de formation
            </a>
            <a class="dropdown-item dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Programme
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="troncCommun.php">
                Tronc commun
              </a>
              <a class="dropdown-item" href="parcoursASR2I.php">
                Parcours ASR2I
              </a>
            </div>
          </div>
        </li>

    <!-- Les différents Espaces selon l'état -->
<?php
if(!empty($_SESSION['etat'])){
         barMenu($_SESSION['etat']);
}else{?>
  <li class="nav-item dropdown <?= isset($entreprise)? $entreprise: ''; ?>">
    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Espace entreprise
    </a>
    <div class="dropdown-menu dropright" aria-labelledby="navbarDropdownMenuLink">
      <a class="dropdown-item" href="add_projet_tut.php">
        Ajouter un projet
      </a>
      <a class="dropdown-item" href="add_stage.php">
        Ajouter des offres d'alternances
      </a>
    </li>
  <li class="nav-item dropdown <?= isset($authentification)? $authentification: ''; ?>">
    <a class="nav-link" href="authentification.php">Connexion</a>
    </li>
  </div>
<?php
}
?>
        <!-- Deconnexion -->
        <!--Connexion-->
      </ul>
    </div>
  </div>
</nav>
