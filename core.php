<?php


session_start();


//if(isset($_POST['submit'])) {
//    header('Location: books.php');
//    exit;
//}

//goto_main();



//echo $user_valid;

$generic_user_keys = ['username', 'password', 'role'];
$user_data_arr = [[ 'Great_Admin', 'pass', 'admin'], ['Jon_Doe', '123456', 'admin'], ['Jane_Doe', 'qwerty', 'user']];
$arr_size = sizeof($user_data_arr);
for ($i = 0; $i <= ($arr_size-1); $i++) {
    $user = array_combine($generic_user_keys, $user_data_arr[$i]);
    $users_arr[] = $user;
}

//print_r($_GET);
//print_r($_POST);

//echo "<br>---------------------------------------------------";
$user_valid = "";


//echo "<br> is_user_valid? --->" . $user_valid;
//echo user_access();
//echo "<br> check_valid_user-->";

function check_valid_user($username, $password) {
    global $users_arr, $generic_user_keys,  $user_valid, $user_data_arr;
    $valid_user = parse_users_arr($users_arr, $generic_user_keys[0], $username);
    $valid_pass = $valid_user ? array_search($password, $user_data_arr[$valid_user]) : false;
    return ($valid_user && $valid_pass) ? $users_arr[$valid_user] : false;

}

function parse_users_arr($target_array, $key, $user_input) {
    $keys_arr = array_column($target_array, $key);
//    echo "<br> keys arr>" . print_r($keys_arr);
    $match_index = array_search($user_input, $keys_arr);
//    echo "<br> match_index>" . $match_index;
//    echo "<br>";
    return $match_index;
}

//echo "<br> ----";


function redirect($url) {
        header('Location:' . $url);
        exit;
    }

function login_stat() {
    if (!isset($_SESSION['user']) || !$_SESSION['user']) {
        redirect('index.php');
    }
}

function is_admin() {
    return (isset($_SESSION['user']) && $_SESSION['user']['role']=='admin') ? true : false;
}


//echo "<br> user valid -->" . $user_valid;




