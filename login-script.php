<?php
session_start();

$user = filter_input(INPUT_POST, "login", FILTER_SANITIZE_STRING);
$mdp = $_POST["pass"];

try {
    $bdd = new PDO('mysql:host=localhost;dbname=base_projet_login', 'root', '');
} catch (Exception $e) {
    die("L'accès à la base de données est impossible.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($user) or empty($mdp)) {
        $_SESSION["errorMessage"] = "Veuillez saisir un login et un mot de passe.";
    } else {
        $connexion = $bdd->prepare("SELECT * FROM users WHERE login=:user");
        $connexion->bindParam(":user", $user);
        $connexion->execute();
        $user_data = $connexion->fetch(PDO::FETCH_ASSOC);

        if ($user_data && password_verify($mdp, $user_data['pwd'])) {
            $_SESSION["user"] = $user; // Utilisez "user" au lieu de "login"
            header("Location: profil.php");
        } else {
            $_SESSION['errorMessage'] = "Nom d'utilisateur ou mot de passe incorrect.";
            header("Location: login-form.php");
        }
    }
}