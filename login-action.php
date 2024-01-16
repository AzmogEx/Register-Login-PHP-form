<?php
session_start();

$login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_STRING);
$mdp = $_POST["pass"];

try {
    $bdd = new PDO('mysql:host=localhost;dbname=base_projet_login', 'root', 'root');
} catch (Exception $e) {
    die("L'accès à la base de donnée est impossible.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($login) or empty($mdp)) {
        $_SESSION['errorMessage'] = "Veuillez saisir un login et un mot de passe.";
    } else {
        $st = $bdd->query("SELECT * FROM users WHERE login='".$login."'")->fetch();

        if ($st && password_verify($mdp, $st['pwd'])) {
            header("Location: access-grant.php");
        } else {
            $_SESSION['errorMessage'] = "Nom d'utilisateur ou mot de passe incorrect.";
            header("Location: login-form.php");
        }
    }
}
?>
