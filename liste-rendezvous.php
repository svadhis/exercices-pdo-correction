<?php
require_once 'connexion.php';

function eol() {
  echo "<br>";
}

$sql = "SELECT * FROM appointments";
$query = $pdo->prepare($sql);
$query->execute();

$rendezVous = $query->fetchAll();

foreach ($rendezVous as $rdv) {
  $date = date_create($rdv['dateHour']);
  $dateFormated = date_format($date,"d/m/Y");

  $sql = "SELECT * FROM patients WHERE id={$rdv['idPatients']}";
  $query = $pdo->prepare($sql);
  $query->execute();

  $patient = $query->fetch();
  echo "<a href=\"rendezvous.php?id={$rdv['id']}\">$dateFormated - {$patient['firstname']} {$patient['lastname']}</a>";
  eol();
}

eol();

?>

<a href="ajout-rendezvous.php">Créer un rendez-vous</a><br>
<a href="index.php">Retour en page d'accueil</a>