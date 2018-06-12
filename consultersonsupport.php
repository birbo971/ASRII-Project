<?php
$enseignant ='active';
$titre ="Consulter un support de cours";
?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php
ifIsConnected();
?>
<?php if($_SESSION['etat'] == "enseignant"){
  ?><!--Content-->
  <div class="container">
    <h1>Consulter vos supports de cours</h1>
    <hr/>
    <br/>
    <?php     $req = consultSupportCours();
        echo '<ul>';
        while($res = $req->fetch()){
          echo "<li><a href=".$res['fileUrl']." class='text-center'>".$res['filename']."</a></li>";
        }
        echo'</ul>';
      }elseif($_SESSION['etat'] == "etudiant" || $_SESSION['etat'] == "personnel miaw" ){ ?>
        <div class="container">
          <h1>Consulter tous les supports de cours</h1>
          <hr/>
          <br/>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>MATIERES</th>
                <th>TITRE</th>
                <th>DOWNLOAD</th>
              </tr>
              <thead>
          <?php
          $req = consultAllSupportCours();
          while($res = $req->fetch()){
            echo "<tr>";
            echo'<td>'.$res['matieres'].'</td>';
            echo'<td>'.$res['filename'].'</td>';
            echo'<td><a href="'.$res['fileUrl'].'" >'.$res['fileUrl'].'</a></td>';
            echo "</tr>";

          }
          ?>
        </table>
        </div>
    <?php }
    ?>
  </div>
  <?php
  include('includes/footer.php');
  ?>
