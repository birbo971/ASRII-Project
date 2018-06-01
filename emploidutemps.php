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
<<<<<<< HEAD
    <hr>
    <br/>
    <?php edtEtudiant(); ?>
=======
  <hr>
  <table>
    <thead>
      <tr>
        <th>
        </th>
        <th>
          Lundi *
        </th>
        <th>
          Mardi *
        </th>
        <th>
          Mercredi *
        </th>
        <th>
          Jeudi *
        </th>
        <th>
          Vendredi *
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <small>09h00</small>
          <br>
          <small>13h00</small>
        </td>
        <td>
          *
        </td>
        <td>
          *
        </td>
        <td>
          *
        </td>
        <td>
          *
        </td>
        <td>
          *
        </td>
      </tr>
      <tr>
        <td>
          <small>13h00</small>
          <br>
          <small>14h00</small>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
      </tr>
      <tr>
        <td>
          <small>14h00</small>
          <br>
          <small>18h00</small>
        </td>
        <td>
          *
        </td>
        <td>
          *
        </td>
        <td>
          *
        </td>
        <td>
          *
        </td>
        <td>
          *
        </td>
      </tr>
    </tbody>
  </table>
>>>>>>> 8a77e5ea459d166f24d44575c5c70e1809810c7f
</div>
<?php include("includes/footer.php"); ?>
