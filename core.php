<?php
session_start();
$generic_user_keys = ['username', 'password', 'role'];
$user_data_arr = [['foo', 'foo', 'foo'], [ 'Great_Admin', 'qwerty', 'admin'], ['Jon_Doe', 'qwerty', 'user'], ['Jane_Doe', 'qwerty', 'user']];

function build_data_array($static_keys, $storage_data) {
    $arr_size = sizeof($storage_data);
    for ($i = 0; $i <= ($arr_size-1); $i++) {
        $obj = array_combine($static_keys, $storage_data[$i]);
        $obj_arr[] = $obj;
    }
    return $obj_arr;
}

$users_arr = build_data_array($generic_user_keys, $user_data_arr);

function check_valid_user($username, $password) {
    global $users_arr, $generic_user_keys, $user_data_arr;
    $valid_user = parse_users_arr($users_arr, $generic_user_keys[0], $username);
    $valid_pass = $valid_user ? array_search($password, $user_data_arr[$valid_user]) : false;
    return ($valid_user && $valid_pass) ? $users_arr[$valid_user] : false;
}

function parse_users_arr($target_array, $key, $user_input) {
    $keys_arr = array_column($target_array, $key);
    $match_index = array_search($user_input, $keys_arr);
    return $match_index;
}

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