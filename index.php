<?php
include('core.php');
$username = $_POST['username'] ? $_POST['username'] : null;
$password = $_POST['password'] ? $_POST['password'] : null;
if ($username && $password) {
    $username = trim($username);
    $password = trim($password);

    $username = stripslashes($username);
    $password = stripslashes($password);
    preg_match("/^[A-Za-z0-9_]{1,20}$/", $username, $match);
    preg_match("/^[A-Za-z0-9_]{1,20}$/", $password, $match);
    if ($match && $password){
        if($user = check_valid_user($username, $password)) {
            $_SESSION['user'] = $user;
            redirect('books.php');
        }
    }
//    print_r($_SESSION['user']);
}
?>

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/js.js"></script>
        <meta charset="utf-8">
    </head>
    <body>
        <div class="container">
            <div class="container">
                <div class="card card-container">
<!--                    <p id="profile-name" class="profile-name-card"></p>-->
                    <form class="form-signin" id="login-form" action="index.php" method="post">
                        <span id="reauth-email" class="reauth-email"></span>
                        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                        <input type="password" name="password" class="form-control" placeholder="Password" value="qwerty" required>
                        <div id="error-log">
                        </div>
                        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="submit">Sign in</button>
                    </form><!-- /form -->
                </div><!-- /card-container -->
            </div><!-- /container -->
        </div>
    </body>
</html>




