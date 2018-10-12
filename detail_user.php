<?php include("connectbdd.php") ?>

<!DOCTYPE html>
<html lang="fr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="images/favicon.png" />
    <title>Afficher les informations d'un utilisateur</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="http://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/securiserform.css">
  </head>

  <body>

    <header>
      <p><a href ='creer_user.php'>Vous inscrire ?<a></p>
      <p><a href='afficher_user.php'>Afficher la liste des utilisateurs ?</a></p>
    </header>

    <main class="detail">
       <?php
          $iduser =$_GET["id"];

          $descriptif = 'SELECT * FROM userform WHERE iduser="'.$iduser.'"';
          $reponse = $dbh->prepare($descriptif);
          // Execution de la requète
          $reponse->execute();

          // On affiche chaque entrée une à  une
          $row = $reponse->fetch(PDO::FETCH_ASSOC);
        ?>
          <h1>Détail de :</h1>
          <p>Nom : <?php echo $row['nom'];?></p>
          <p>Prénom : <?php echo $row['prenom'];?></p>
          <p>mail : <?php echo $row['email'];?></p>
          <p>code postale : <?php echo $row['cp'];?></p>

            <?php
             $reponse->closeCursor();// Termine le traitement de la requète
            ?>
      </main>

      <footer>
         <p><a href ='creer_user.php'>Vous inscrire ?<a></p>
         <p><a href='afficher_user.php'>Afficher la liste des utilisateurs ?</a></p>
      </footer>

  </body>

</html>
