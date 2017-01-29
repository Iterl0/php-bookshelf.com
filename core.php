<?php
session_start();
//session_destroy();
//if(isset($_POST['submit'])) {
//    header('Location: books.php');
//    exit;
//}

//goto_main();



//echo $user_valid;

$generic_user_keys = ['username', 'password', 'role'];
$user_data_arr = [[ 'Great_Admin', 'Adminn', 'admin'], ['Jon_Doe', 'qwerty', 'user'], ['Jane_Doe', 'qwerty', 'user']];
$arr_size = sizeof($user_data_arr);
for ($i = 0; $i <= ($arr_size-1); $i++) {
    $user = array_combine($generic_user_keys, $user_data_arr[$i]);
    $users_arr[] = $user;
}

//print_r($_GET);
print_r($_POST);
$username = $_POST[username];
$password = $_POST[password];

echo "<br>---------------------------------------------------";
$user_valid = "";

check_valid_user();
echo "<br> is_user_valid? --->" . $user_valid;
//echo user_access();
echo "<br> check_valid_user-->";

function check_valid_user() {
    global $users_arr, $generic_user_keys, $username, $password, $user_valid, $user_data_arr;
    $valid_user = parse_users_arr($users_arr, $generic_user_keys[0], $username);
    is_int($valid_user) ? $valid_pass = array_search($password, $user_data_arr[$valid_user]) : null;
    echo "<br> valid_pass - >";
    echo $valid_pass;
    return $user_valid = (is_int($valid_user) && $valid_pass==1) ? true : false;
}

function parse_users_arr($target_array, $key, $user_input) {
    $keys_arr = array_column($target_array, $key);
    $match_index = array_search($user_input, $keys_arr);
    return $match_index;
}

echo "<br> ----";


//function redirect() {
//    if(isset($_POST['submit'])){
//        header('Location: books.php');
//        exit;
//    }
//}




echo "<br> user valid -->" . $user_valid;


if(isset($_POST['submit']) && $user_valid) {
    $_SESSION[username] = $_POST[username];
    $URL="books.php";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
//    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
}



echo "<br>";
echo "<br> _SESSION - >" . $_SESSION["username"];
echo "<br> end of core! --------- ";
echo "<br>";

