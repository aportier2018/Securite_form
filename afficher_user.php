<?php include("connectbdd.php") ?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="images/favicon.png" />
  <title>Afficher la liste des utilisateurs inscrits</title>
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
  <main class= "afficher">
       <h1>Liste des noms des utilisateurs inscrits</h1>
       <section class="liste_user">
                <?php

              // Requête SQL qui va retourner toutes les entrées de la table "userform"
              $QueryToExecute = 'SELECT * FROM userform';

              $reponse = $dbh->query($QueryToExecute);
              // Execution de la requête
              //$reponse->execute();
              // On affiche chaque entrée une à une
              while ($row = $reponse->fetch(PDO::FETCH_ASSOC))
              {
              ?>
         <p class="nom" >
          <a href="detail_user.php?id=<?php echo $row['iduser']; ?>"><?php echo $row['nom']; ?>
          </a>
        </p>
              <?php
              }
              $reponse->closeCursor(); // Termine le traitement de la requête
              ?>
     </section>
  </main>
  <footer>
     <p><a href ='creer_user.php'>Vous inscrire ?<a></p>
     <p><a href='afficher_user.php'>Afficher la liste des utilisateurs ?</a></p>
  </footer>

</body>

</html>
