<?php
function login($user, $mdp)
{
    $ret = false;
    $cnx = connect_bd("base_projet_login");
    $st = $cnx->prepare("SELECT * FROM users WHERE login=:user");
    $st->bindParam(":user", $user);
    $st->execute();
    $row = $st->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        if (password_verify($mdp, $row['pwd'])) {
            $_SESSION["user"] = $user;
            $ret = true;
        }
    }
    return $ret;
}

function logout()
{
    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header("Location: login-form.php");
        exit();
    }
}

// function getMailLoggedOn()
// {
//     if (isLoggedOn()) {
//         $ret = $_SESSION["user"];
//     } else {
//         $ret = "";
//     }
//     return $ret;
// }