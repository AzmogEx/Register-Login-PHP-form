<?php
$login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_STRING);
$mdp = $_POST["pass"];

try {
    $bdd = new PDO('mysql:host=localhost;dbname=base_projet_login', 'root', 'root');
} catch (Exception $e) {
    die("L'accès à la base de donnée est impossible.");
}

if (empty($login) or empty($mdp)) {
    echo "Veuillez saisir un login et un mot de passe.";
} else {
    $st = $bdd->query("SELECT * FROM users WHERE login='".$login."'")->fetch();

    if ($st && password_verify($mdp, $st['pwd'])) {
        header("Location: home.php");
    } else {
        echo "Nom d'utilisateur ou mots de passe incorrect.";
    }
}
?>
