<?php
include('core.php');
login_stat();

print_r($_SESSION['user']);

echo "<br>";
echo "<br> book id>" . $book_id;


if (isset($_GET['book'])) {
    $book_id = $_GET['book'];
    $book_edit = $_SESSION['books_arr'][$book_id];
    $b_name = $book_edit[in_name];
    $b_auth = $book_edit[in_auth];
    $b_date = $book_edit[in_date];
    $button_label = 'Update';
} else {
    $b_name = "";
    $b_auth = "";
    $b_date = "";
    $button_label = 'Create';
}


if (!empty($_SESSION['current_book'])) {
    if ($_SESSION['current_book']['action'] == 'Update') {
        unset($_SESSION['current_book']['action']);
        $book_id = $_SESSION['current_book']['book_id'];
        unset($_SESSION['current_book']['book_id']);
        $_SESSION['books_arr'][$book_id] = $_SESSION['current_book'];
        unset($_SESSION['current_book']);
    } else {
        unset($_SESSION['current_book']['action']);
        $_SESSION['books_arr'][] = $_SESSION['current_book'];
        unset($_SESSION['current_book']);

    }



}




echo "<br>";
echo "<br> session>" . print_r($_SESSION);

echo "<br>";
echo "<br> post>" . print_r($_POST);

echo "<br>";
echo "<br> get>" . print_r($_GET);

echo "<br>" . sizeof($_SESSION['books_arr']);
$count = sizeof($_SESSION['books_arr']);

//function add_row($count){
//
//    for ($i=0; $i<$count; $i++) {
//        echo "<tr>";
//            for ($k=0; $k<=3; $k++) {
//                echo "
//                <td class='text-left'>" . $_SESSION['books_arr'][$i][$k] . "</td>
//                ";
//            }
//        echo "</tr>";
//    }
//    //    return $count!==1 ? add_row($count-1) : null;
//}

function add_row () {

    foreach ($_SESSION['books_arr'] as $sup_arr => $key){
            $edit = '<a href="/php-bookshelf.com/books.php?book=' . $sup_arr . '">Edit</a>';
            echo "<tr>"
                    . "<td class='text-left'>" . $key['in_name'] . "</td>"
                    . "<td class='text-left'>" . $key['in_auth'] . "</td>"
                    . "<td class='text-left'>" . $key['in_date'] . "</td>"
                    . "<td class='text-left'>  $edit  </td>";
            echo "<tr>";
//        }
    }
}

//$in_name = $_POST['in_name'] ? $_POST['in_name'] : null;
//$in_auth = $_POST['in_auth'] ? $_POST['in_auth'] : null;
//$in_date = $_POST['in_date'] ? $_POST['in_date'] : null;


//$_SESSION['current_book'][$key] = $book;


?>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="js/js.js">
        </script>
        <meta charset="utf-8" />
        <title>Table Style</title>
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, width=device-width">
    </head>

    <body>


                <div class="table-title">
            <h3>Data Table</h3>
        </div>
                <div class="container">
                    <div class="row">
                        <div>
                            <div class="container" id="edit_form">
                                <div class="row">
                                    <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <form id="book-reg" action="books.php" method="post">
                                                        <div class="col-md-3">
                                                                <label for="in_name">Book name</label>
                                                                <input type="text" class="form-control" required="" name="in_name" value="<?php echo $b_name ?>">
                                                        </div>
                                                        <div class="col-md-3">
                                                                <label for="in_auth">Author</label>
                                                                <input type="text" class="form-control" required="" name="in_auth" value="<?php echo $b_auth ?>">
                                                        </div>
                                                        <div class="col-md-3">
                                                                <label for="in_date">Date of publication</label>
                                                                <input type="text" class="form-control" required="" name="in_date" value="<?php echo $b_date ?>">
                                                        </div>
                                                        <?php if(isset($book_id)){ ?>
                                                            <input type="text" name="book_id" value="<?php echo $book_id ?>" />
                                                        <?php } ?>
                                                        <div class="col-md-3">
                                                                <button type="submit" class="btn btn-default btn-icon" data-dismiss="modal" name="action" formaction="update_table.php" value="<?php echo $button_label ?>"><?php echo $button_label ?></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div>
                            <table class="table-fill" id="myTable">
                                <thead>
                                <tr>
                                    <th class="text-left">Book</th>
                                    <th class="text-left">Author</th>
                                    <th class="text-left">Date of publication</th>
                                    <th class="text-left"> </th>
                                </tr>
                                </thead>
                                <a href="logout.php" class="btn btn-default">log out</a>
<!--                                --><?php //if (is_admin()): ?><!--  -->
                                    <tbody id="main_table">
<!--                                    --><?php //$count!==0 ? add_row($count) : null ?>
                                    <?php $count!==0 ? add_row() : null ?>
                                    <tr>
                                        <td class="text-left">January</td>
                                        <td class="text-left">$ 50,000.00</td>
                                        <td class="text-left">$ 50,000.00</td>
                                        <td class="text-left"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">January</td>
                                        <td class="text-left">$ 50,000.00</td>
                                        <td class="text-left">$ 50,000.00</td>
                                        <td class="text-left"></td>
                                    </tr>
                                    </tbody>
<!--                                --><?php //endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
    </body>

