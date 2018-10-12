<?php
require('recaptcha/autoload.php');

  if(isset($_POST['g-recaptcha-response'])) {
    $recaptcha = new \ReCaptcha\ReCaptcha('6Lf7k3QUAAAAAMADYz_W6v2x2hM2le7kcSsk1eDu');
    $resp = $recaptcha->setExpectedHostname('recaptcha-demo.appspot.com')
                      ->verify($_POST['g-recaptcha-response'], $remoteIp);
      if ($resp->isSuccess()) {
        var_dump('captcha valide');
          // Verified!
      } else {
          $errors = $resp->getErrorCodes();
          var_dump('captcha invalide');
          var_dump($errors);
      }
  }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="images/favicon.png" />
  <title>sécuriser un formulaire</title>
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link href="http://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/securiserform.css">

  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>

  <main>
    <form method="post" action="verif_form.php">

        <legend>Mise en place d'un Formulaire sécurisé</legend>

        <label for="nom">Nom : </label>
        <input type="text" name="nom" id="nom" required><br>

        <label for="prenom">Prenom : </label>
        <input type="text" name="prenom" id="prenom" required><br>

        <label for="email">Email : </label>
        <input type="email" name="email" id="email" required><br>

        <label for="ad_user">Code postal : </label>
        <input type="text" name="cp" id="cp" required><br>

        <label for="mdp1">Mot de passe : </label>
        <input type="password" name="mdp1" id="mdp1" required><br>
        <label for="mdp2">Confirmer mot de passe : </label>
        <input type="password" name="mdp2" id="mdp2" required><br>

        <div class="g-recaptcha" data-sitekey="6Lf7k3QUAAAAAPBdhofX8gyzXK019igoKibEEOna"></div>

        <input type="submit" value="Envoyer" name='submit'>
        <input type="reset" value="RESET">
    </form>
  </main>

</body>

</html>
