<?php

require_once '../connexion.php';

if (
  !isset($_POST['id']) ||
  !isset($_POST['lastname']) ||
  !isset($_POST['firstname']) ||
  !isset($_POST['birthdate']) ||
  !isset($_POST['mail']) ||
  !isset($_POST['phone'])
) {
  header('Location: /');
} else {
  $sql = "UPDATE patients SET lastname = ?, firstname = ?, birthdate = ?, mail = ?, phone = ? WHERE id = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['mail'], $_POST['phone'], $_POST['id']]);

  header("Location: ../profil-patient.php?id={$_POST['id']}");
}

?>