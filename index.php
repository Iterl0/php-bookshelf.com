<?php
include('core.php');
$username = $_POST['username'] ? $_POST['username'] : null;
$password = $_POST['password'] ? $_POST['password'] : null;
if ($username && $password ) {
    $username = trim($username);
    $password = trim($password);

    $username = stripslashes($username);
    $password = stripslashes($password);
//    session_destroy();
    preg_match("/^[A-Za-z0-9_]{1,20}$/", $username, $match);
    preg_match("/^[A-Za-z0-9_]{1,20}$/", $password, $match);
    if ($match && $password){
        if($user = check_valid_user($username, $password)) {
//            session_start();
            $_SESSION['user'] = $user;
            redirect('books.php');
        }
    }
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
        </script>
        <script type="text/javascript" src="js/js.js">
        </script>
        <meta charset="utf-8">
        <!-- 	<meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

    </head>

    <body>
        <div class="container">
            <!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
            -->
            <div class="container">
                <div class="card card-container">
                    <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                    <p id="profile-name" class="profile-name-card"></p>
                    <form class="form-signin" id="login-form" action="index.php" method="post">
                        <span id="reauth-email" class="reauth-email"></span>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="qwerty" required>
                        <div id="error-log">
                        </div>
                        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="submit">Sign in</button>
                    </form><!-- /form -->
                </div><!-- /card-container -->
            </div><!-- /container -->
        </div>
    </body>
</html>




