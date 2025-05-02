<?php

$con = mysqli_connect('localhost', 'root', '', 'avigest');

// Vérifier la connexion
if (!$con) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

// Récupérer les données du formulaire
$nom = trim($_POST['nom']);
$prenom = trim($_POST['prenom']);
$telephone = trim($_POST['telephone']);
$email = trim($_POST['email']);
$role = trim($_POST['role']);
$date_creation = $_POST['date'];
$compte_actif = isset($_POST['active']) ? 1 : 0;
$mot_de_passe_brut = $_POST['password'];
$erreurs = [];

// Validation des données
if (strlen($mot_de_passe_brut) < 8 ||
    !preg_match('/[A-Z]/', $mot_de_passe_brut) ||
    !preg_match('/[a-z]/', $mot_de_passe_brut) ||
    !preg_match('/[0-9]/', $mot_de_passe_brut)) {
    $erreurs[] = "Le mot de passe est invalide.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erreurs[] = "L'adresse email est invalide.";
}

if (empty($erreurs)) {
    $mot_de_passe = password_hash($mot_de_passe_brut, PASSWORD_DEFAULT);

    // Préparer la requête SQL pour éviter les injections
    $stmt = $con->prepare("INSERT INTO utilisateur (nom, prenom, telephone, email, mot_de_passe, role, date_creation, actif)
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssi", $nom, $prenom, $telephone, $email, $mot_de_passe, $role, $date_creation, $compte_actif);

    if ($stmt->execute()) {
        require_once(__DIR__ . '/pages/tableau_de_bord.php');
    } else {
        echo "Erreur lors de l'insertion : " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Erreurs : " . implode("<br>", $erreurs);
}

mysqli_close($con);

?>


