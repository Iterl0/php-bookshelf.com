<?php
include('core.php');

//$action = $_POST['action'] ? $_POST['action'] : null;
//echo "<br> post";
//print_r($_POST);




//$in_name = $_POST['in_name'] ? $_POST['in_name'] : null;
//$in_auth = $_POST['in_auth'] ? $_POST['in_auth'] : null;
//$in_date = $_POST['in_date'] ? $_POST['in_date'] : null;

//$book_in_process = [$in_name, $in_auth, $in_date];

foreach ($_POST as $key => $book) {
    $_SESSION['current_book'][$key] = $book;
}




//if($_POST['action'] == 'Update') {
//    $_SESSION
//}



////
//echo "<br>";
//echo "<br> session>" . print_r($_SESSION);
//

//function add_row(){
//    global $in_name, $in_auth, $in_date;
//    echo "
//        <tr>
//            <td class='text-left'>" . $_SESSION['books_arr'][0][0] . "</td>
//            <td class='text-left'>" . $_SESSION['books_arr'][0][1] . "</td>
//            <td class='text-left'>" . $_SESSION['books_arr'][0][2] . "</td>
//            <td class='text-left'></td>
//        </tr>
//    ";
//
//}

//echo "<br>";

//print_r($books_arr);

//echo "<br>";
//echo "<br>";
//echo "<br>";
//echo "<br>";

//$res = array_diff($_POST, array('action'));
//echo "<br> diff>";
//print_r($res);
//$array = $_POST; //throw in another 'strawberry' to demonstrate that it removes multiple instances of the string
//$array_without_strawberries = array_diff($array, array(['action']));
//print_r($array);
//echo "<br>";
//print_r($array_without_strawberries);




//echo "<br>";
//echo "<br>";
//echo "<br>";
////echo "<br>";
////echo "<br>";
//if (isset($_POST['action'])) {
//    foo();
//    unset($_POST['action']);
////    print_r($_POST);
//
//}
//
//function foo() {
//    global $books_arr;
//    $_SESSION['books_arr'][] = $books_arr;
//}
//


//
//echo "<br>";
//echo "<br>";
//echo "<br> session>" . print_r($_SESSION);



redirect("books.php");

