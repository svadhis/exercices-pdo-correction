<?php

require_once 'connexion.php';

// Controler que GET['id'] existe
if (!isset($_GET['id'])) {
  echo "Aucun ID envoyé";
}

else {
  // Récupérer l'ID du patient dans le GET
  $idDuPatient = $_GET['id'];

  // Récupérer les infos du patient en BDD
  $sql = "SELECT * FROM patients WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id' => $idDuPatient]);

  $patient = $stmt->fetch();

  if (!$patient) {
    echo "Aucun utilisateur avec l'id $idDuPatient trouvé";
  }

  else {
    // Afficher les données du patient
    echo "Nom : {$patient['lastname']} <br>
    Prénom : {$patient['firstname']} <br>
    Date de naissance : {$patient['birthdate']} <br>
    Email : {$patient['mail']} <br>";
  }

}
?>

<a href="modification-patient.php?id=<?= $patient['id']; ?>">Modifier le patient</a>
<a href="liste-patients.php">Retour à la liste des patients</a>