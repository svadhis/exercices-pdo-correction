<?php

require_once 'connexion.php';

// Controler que GET['id'] existe
if (!isset($_GET['id'])) {
  echo "Aucun ID envoyé";
}

else {
  $idDuRendezVous = $_GET['id'];

  $sql = "SELECT * FROM appointments WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id' => $idDuRendezVous]);

  $rdv = $stmt->fetch();

  if (!$rdv) {
    echo "Aucun rendez-vous avec l'id $idDuRendezVous trouvé";
  }
  else {
  $sql = "SELECT * FROM patients WHERE id={$rdv['idPatients']}";
  $query = $pdo->prepare($sql);
  $query->execute();

  $patient = $query->fetch();

  $date = date_create($rdv['dateHour']);
  $dateFormated = date_format($date,"d/m/Y");

    echo "Date du rendez-vous : $dateFormated <br>
    Patient : {$patient['firstname']} {$patient['lastname']} <br>";
  }

}
?>

<a href="modification-rendezvous.php?id=<?= $rdv['id']; ?>">Modifier le rendez-vous</a>
<a href="liste-rendezvous.php">Retour à la liste des rendez-vous</a>