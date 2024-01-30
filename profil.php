<?php
session_start();

include_once 'authentification.inc.php';

//verification utilisateur connecté
if (!isset($_SESSION['user'])) {
    header("Location: login-form.php");
    exit();
}
logout();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Page de création</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style-register.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="register-form">
        <form method="post">
            <h1 class="text-center">Bienvenue
                <?php echo $_SESSION["user"]; ?>!
            </h1>
            <h2 class="text-center">Vous êtes connecté !</h2>
            <button type="submit" name="logout" class="btn btn-primary btn-block">Se déconnecter</button>
            <div class="form-group">
                <a href="index.php" class="btn mt-3 btn-primary btn-block">Accueil</a>
            </div>
        </form>
    </div>

    <script src="script.js"></script>
</body>

</html>