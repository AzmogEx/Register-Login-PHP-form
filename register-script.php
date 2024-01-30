<?php
session_start();

$login = filter_input(
    INPUT_POST,
    "login",
    FILTER_SANITIZE_STRING
);
$mdp = password_hash($_POST["pass"], PASSWORD_DEFAULT);

try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=base_projet_login',
        'root',
        ''
    );
} catch (Exception $e) {
    die("L'accès à la base de donnée est impossible.");
}

$errors = array();

if (empty($login) or empty($mdp)) {
    $errors[] = "Veuillez saisir un login et un mot de passe.";
} else {
    $checkUser = $pdo->prepare("SELECT * FROM users WHERE login = ?");
    $checkUser->execute([$login]);

    $password = $_POST["pass"];
    if (strlen($password) < 8 || !preg_match("#[0-9]+#", $password) || !preg_match("#[a-zA-Z]+#", $password)) {
        $errors[] = "Le mot de passe ne respecte pas les critères de sécurité.";
    } else {
        if ($checkUser->rowCount() > 0) {
            $errors[] = "Ce nom d'utilisateur existe déjà.";
        } else {
            $ins = $pdo->prepare("INSERT INTO users (login, pwd) VALUES(?, ?)");
            $ins->execute(array($login, $mdp));

            $_SESSION["user"] = $login;

            header("Location: profil.php");
            exit();
        }
    }
}

$_SESSION['errors'] = $errors;
header("Location: register-form.php");
exit();