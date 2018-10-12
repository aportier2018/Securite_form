<?php
$host_name = 'localhost';
$database = 'securitform';
$user_name = 'securitform';
$password = 'XtsaTVamZJJ4t8gy';

$dbh = null;
try {
  $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
  $dbh->exec("SET CHARACTER SET utf8");
} catch (PDOException $e) {
  echo "Erreur!: " . $e->getMessage() . "<br/>";
  die();
}
?>
