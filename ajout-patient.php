<?php
require_once 'connexion.php';

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $birthdate = $_POST['birthdate'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];

    // Ecriture de la requête en SQL
    $sql = "INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUES (?, ?, ?, ?, ?)";

    // Préparation de la requête
    $stmt = $pdo->prepare($sql);

    // Execution de la requête
    $stmt->execute([$lastname, $firstname, $birthdate, $phone, $mail]);

    echo "Patient ajouté avec succès";
}
?>

<form method="POST">
    Nom: <input type="text" name="lastname" required><br>
    Prénom: <input type="text" name="firstname" required><br>
    Date de naissance: <input type="date" name="birthdate" required><br>
    Téléphone: <input type="tel" name="phone" required><br>
    Email: <input type="email" name="mail" required><br>
    <input type="submit" value="Ajouter le patient">
</form>

<a href="index.php">Retour à l'accueil</a>
