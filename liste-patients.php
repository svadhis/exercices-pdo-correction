<?php
require_once 'connexion.php';

function eol() {
  echo "<br>";
}

$sql = "SELECT * FROM patients";
$query = $pdo->prepare($sql);
$query->execute();

$patients = $query->fetchAll();

foreach ($patients as $patient) {
  echo "<a href=\"profil-patient.php?id={$patient['id']}\">{$patient['lastname']} {$patient['firstname']}</a>";
  eol();
}

eol();

?>

<a href="ajout-patient.php">Ajouter un patient</a><br>
<a href="index.php">Retour en page d'accueil</a>