<?php include("connectbdd.php") ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vérifier les données du securitform</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">

  	<link href="http://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
      <h1>formulaire securisé</h1>
        <div>
          <?php
          /* les champs sont récupérer*/
               $nom = htmlspecialchars($_POST['nom']);
               $prenom = htmlspecialchars($_POST['prenom']);
               $email = htmlspecialchars($_POST['email']);
               $cp   = htmlspecialchars($_POST['cp']);
               $mdp1 = htmlspecialchars($_POST['mdp1']);
               $mdp2 = htmlspecialchars($_POST['mdp2']);



                if ((preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) && (preg_match("#^[0-9][1-9][ ]?[0-9]{3}$#", $cp)) && ($mdp1 == $mdp2)) {
                    $mdpsha = sha1($mdp1);
                    $sql ="INSERT INTO userform(nom, prenom, email, cp, mdp) VALUES('$nom','$prenom','$email','$cp','$mdpsha')";
                    $reponse = $dbh->prepare($sql);
                    $reponse->execute();
                    $reponse->closeCursor(); /*Termine le traitement de la requète*/

                    echo "<p>L'utilisateur a été ajouté</p>";
                    echo "<p>Cliquez <a href='index.php'>ici</a> pour revenir au formulaire.</p>";

                }
                else {

                  /*test pour vérifier si l'adresse Email est correcte */
                      if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {
                          echo '<p>L\'adresse <strong>' . $email . '</strong> a une struture <strong>valide</strong> !</p>';
                      }
                      else {
                          echo '<p>Erreur : L\'adresse <strong>' . $email . '</strong> n\'a pas une struture valide. </p>';
                      }

                  /*test pour vérfier si le code postal est correct */
                       if (preg_match("#^[0-9][1-9][ ]?[0-9]{3}$#", $cp)) {
                           echo '<p>Le code postal <strong>' . $cp . '</strong> a une struture <strong>valide</strong> !</p>';
                       }
                       else {
                           echo '<p>Erreur : Le code postal <strong>' . $cp . '</strong> n\'a pas une struture valide.</p>';
                       }

                   /*test pour vérfier si les mots de passe sont identiques */
                       if ($mdp1 == $mdp2) {
                          $mdpsha = sha1($mdp1);
                          echo " <p>Les mots de passe sont <strong>identiques</strong></p>";
                       }
                       else {
                             echo "<p>Errreur : Les mots de passe sont <strong>différents</strong></p>";
                       }

                   echo "<p>Cliquez <a href='index.php'>ici</a> pour revenir au formulaire pour corriger l'erreur.</p>";
                }

      ?>

    </div>
  </body>
</html>
