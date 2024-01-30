<?php
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
        'root'
    );
} catch (Exception $e) {
    die("L'accès à la base de donnée est impossible.");
}

if (empty($login) or empty($mdp)) {
    echo "Veuillez saisir un login et un mot de passe.";
} else {
    // Vérification de l'existence de l'utilisateur
    $checkUser = $pdo->prepare("SELECT * FROM users WHERE login = ?");
    $checkUser->execute([$login]);

    // Validation de la force du mot de passe
    $password = $_POST["pass"];
    if (strlen($password) < 8 || !preg_match("#[0-9]+#", $password) || !preg_match("#[a-zA-Z]+#", $password)) {
        echo "Le mot de passe ne respecte pas les critères de sécurité.";
    } else {
        if ($checkUser->rowCount() > 0) {
            echo "Ce nom d'utilisateur existe déjà.";
        } else {
            // Insertion des données dans la base de données
            $ins = $pdo->prepare("INSERT INTO users (login, pwd) VALUES(?, ?)");
            $ins->execute(array($login, $mdp));
            echo "Le compte a été créé avec succès.";
            // Vous pouvez ajouter d'autres actions ici si nécessaire
        }
    }
}