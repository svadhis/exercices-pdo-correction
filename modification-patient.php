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
}

?>

<form method="POST" action="scripts/modifier-patient.php">
  <input type="hidden" name="id" value="<?= $patient['id'] ?>">
    Nom: <input type="text" name="lastname" required value="<?= $patient['lastname'] ?>"><br>
    Prénom: <input type="text" name="firstname" required value="<?= $patient['firstname'] ?>"><br>
    Date de naissance: <input type="date" name="birthdate" required value="<?= $patient['birthdate'] ?>"><br>
    Téléphone: <input type="tel" name="phone" required value="<?= $patient['phone'] ?>"><br>
    Email: <input type="email" name="mail" required value="<?= $patient['mail'] ?>"><br>
    <input type="submit" value="Modifier le patient">
</form>