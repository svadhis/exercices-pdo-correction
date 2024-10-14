<?php
require_once 'connexion.php';

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dateHour = $_POST['dateHour'];
    $patient = $_POST['patient'];

    // Ecriture de la requête en SQL
    $sql = "INSERT INTO appointments (dateHour, idPatients) VALUES (?, ?)";

    // Préparation de la requête
    $stmt = $pdo->prepare($sql);

    // Execution de la requête
    $stmt->execute([$dateHour, $patient]);

    echo "Rendez-vous créé avec succès";
}

$sql = "SELECT * FROM patients";
$query = $pdo->prepare($sql);
$query->execute();

$patients = $query->fetchAll();
?>

<form method="POST">
    Date du rendez-vous: <input type="date" name="dateHour" required><br>
    Patient: <select name="patient">
      <?php
      foreach ($patients as $patient) {
        echo "<option value=\"{$patient['id']}\">{$patient['firstname']} {$patient['lastname']}</option>";
      }

      ?>
    </select><br>
    <input type="submit" value="Créer le rendez-vous">
</form>

<a href="index.php">Retour à l'accueil</a>