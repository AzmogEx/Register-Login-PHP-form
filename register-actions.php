<?php
$login = filter_input(INPUT_POST, "login",
FILTER_SANITIZE_STRING);
$mdp= password_hash($_POST["pass"], PASSWORD_DEFAULT);
try {
$pdo = new PDO('mysql:host=localhost;dbname=base_projet_login',
'root', 'root');
}
catch (Exception $e) {
die("L'accès à la base de donnée est impossible.");
}
if (empty($login) or empty($mdp)) {
echo "veuillez saisir un login et un mot de passe";
}
else {
$ins = $pdo->prepare("INSERT INTO users (login, pwd)
VALUES(?, ?)");
$ins->execute(array($login, $mdp));
header("Location: login-form.php");
}