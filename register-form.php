<?php
if (isset($_GET['error'])) {
    $errorMessage = "";
    switch ($_GET['error']) {
        case 'exists':
            $errorMessage = "Ce nom d'utilisateur existe déjà.";
            break;
        case 'weakpassword':
            $errorMessage = "Le mot de passe ne respecte pas les critères de sécurité.";
            break;
        default:
            $errorMessage = "Une erreur inconnue s'est produite.";
            break;
    }
    echo '<p class="text-danger">' . $errorMessage . '</p>';
}
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
        <form action="register-script.php" method="post">
            <h2 class="text-center">Créer un compte</h2>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" name="login" required="required">
                <?php
                if (isset($_GET['error']) && $_GET['error'] === 'exists') {
                    echo '<p class="text-danger">le nom d\'utilisateur existe déjà ou alors le mdp n\'est pas conforme.</p>';
                }
                ?>
            </div>
            <div class="form-group">
                <input type="password" id="pass" class="form-control" placeholder="Password" name="pass" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Créer</button>
            </div>
            <div class="clearfix">
                <label class="float-left form-check-label"><input type="checkbox"> Se rappeler</label>
                <a href="#" class="float-right">Mots de passe oublié ?</a>
            </div>
        </form>
    </div>
    <!--======================VERIFICATOR=================================-->
    <div id="message" class="message-form">
        <form action="register-actions.php" method="post">
            <h3>Le mot de passe doit contenir les éléments suivants</h3>
            <div>
                <p id="letter" class="invalid">Une lettre minuscule</p>
                <p id="capital" class="invalid">Une lettre majuscule</p>
                <p id="number" class="invalid">Un chiffre minimum</p>
                <p id="length" class="invalid">8 caractères minimum</p>
            </div>
        </form>
    </div>
    <!--======================ACCUEIL BUTTON=================================-->
    <div class="accueil-form">
        <div class="accueil">
            <a href="index.php" class="btn-close btn-close-hover">Accueil</a>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>