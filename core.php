<?php

//if(isset($_POST['login'])){
////    check_user();
//    header("Location: books.php");
//    exit;
//}


    function check_user () {
        $username = $_POST['inputUsername'];
        $password = $_POST['inputPassword'];
        $arr_size = sizeof($generic_user_values);
        for ($i = 0; $i <= ($arr_size-1); $i++) {
            $val1 = $generic_user_values[$i];
            $val2 =
            $users_arr[] = $user;
        }
        parse_userArr();
    }





    function match_user ($subject, $pattern) {
        if (preg_match($subject, $pattern)) {
            return true;
        } else {
            return false;
        }

    }

//'/^[A-Za-z0-9]+$/'

//echo "<p>";


//[
//    'username' => 'Great_Admin',
//    'password' => 'Hello_World',
//    'role' => 'admin'
//]

$generic_user_values = ['username', 'password', 'role'];

$user_data_arr = [[ 'Great_Admin', 'Hello_World', 'admin'], ['Jon_Doe', 'Doe43', 'user'], ['Jane_Doe', '43Doe', 'user']];

$arr_size = sizeof($user_data_arr);
for ($i = 0; $i <= ($arr_size-1); $i++) {
    $user = array_combine($generic_user_values, $user_data_arr[$i]);
    $users_arr[] = $user;
}

//print_r($users_arr);

/*
 *
 */
function parseUserArr($val1, $val2){
    match_user($val1);
//    $users_arr =

}







