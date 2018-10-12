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
  	<link rel="stylesheet" type="text/css" href="css/securiserform.css">
</head>

<body>
  <header>
    <p><a href ='creer_user.php'>Vous inscrire ?<a></p>
    <p><a href='afficher_user.php'>Afficher la liste des utilisateurs ?</a></p>
  </header>
      <h1>Vérification du formulaire</h1>
        <div>
          <?php
          /* les champs sont récupérer*/
               $nom = htmlentities($_POST['nom']);
               $prenom = htmlentities($_POST['prenom']);
               $email = htmlentities($_POST['email']);
               $cp   = htmlentities($_POST['cp']);
               $mdp1 = htmlentities($_POST['mdp1']);
               $mdp2 = htmlentities($_POST['mdp2']);


    /*test pour vérifier si les champs sont correctes */
                if ((preg_match("#[a-z0-9._-]{1,}@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) && (preg_match("#^(2[ab]|[0-9][1-9])[ ]?[0-9]{3}$#", $cp)) && ($mdp1 == $mdp2)) {
                    $mdpsha = sha1($mdp1);
                    $sql ="INSERT INTO userform(nom, prenom, email, cp, mdp) VALUES('$nom','$prenom','$email','$cp','$mdpsha')";
                    $reponse = $dbh->prepare($sql);
                    $reponse->execute();
                    $reponse->closeCursor(); /*Termine le traitement de la requète*/

                    echo "<p>L'utilisateur a été ajouté</p>";
                    echo "<p>Cliquez <a href='index.php'>ici</a> pour revenir au formulaire.</p>";

                }
                else {
                  /*affichage le type d'erreur*/
                  /*test pour vérifier si l'adresse Email est correcte */
                      if (preg_match("#^[\w.-]+@[\w.-]{2,}\.[a-z]{2,4}$#", $email)) {
                          echo '<p>L\'adresse <strong>' . $email . '</strong>valide.</p>';
                      }
                      else {
                          echo '<p>ERREUR : L\'adresse <strong>' . $email . '</strong> <strong>INVALIDE !</strong>. </p>';
                      }

                  /*test pour vérfier si le code postal est correct */
                       if (preg_match("#^(2[ab]|[0-9][1-9])[ ]?[0-9]{3}$#", $cp)) {
                           echo '<p>Le code postal <strong>' . $cp . ' valide</p>';
                       }
                       else {
                           echo '<p>ERREUR : Le code postal <strong>' . $cp . '</strong>INVALIDE !</p>';
                       }

                   /*test pour vérfier si les mots de passe sont identiques */
                       if ($mdp1 == $mdp2) {
                          $mdpsha = sha1($mdp1);
                          echo " <p>Les mots de passe identiques</p>";
                       }
                       else {
                             echo "<p>ERREUR : Les mots de passe sont <strong>DIFFERENTS !</strong></p>";
                       }

                   echo "<p>Cliquez <a href='creer_user.php'>ici</a> pour revenir au formulaire.</p>";
                }
      ?>
    </div>
    <footer>
       <p><a href ='creer_user.php'>Vous inscrire ?<a></p>
       <p><a href='afficher_user.php'>Afficher la liste des utilisateurs ?</a></p>
    </footer>
  </body>
</html>
