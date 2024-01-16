<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Page de Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style-login.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="login-form">
    <form action="login-action.php" method="post">
        <h2 class="text-center">Log in</h2>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" name="login" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="pass" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
        </div>
        <div class="clearfix">
            <label class="float-left form-check-label"><input type="checkbox"> Se rappeler</label>
            <a href="#" class="float-right">Mots de passe oublié ?</a>
        </div>        
    </form>
    <p class="text-center"><a href="register-form.php">Créer un compte</a></p>
</div>
</body>
</html>