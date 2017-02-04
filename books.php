<?php
include('core.php');
login_stat();

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



$count = sizeof($_SESSION['books_arr']);

function add_row () {
    foreach ($_SESSION['books_arr'] as $sup_arr => $key){



            $edit = '<a href="books.php?book=' . $sup_arr . '" data-toggle="modal" data-target="#myModal">Edit</a>';
//            $edit = '
//                     <form action="books.php" method="get">
//                     <button type="submit" name="book" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
//                     <input type="text" name="book" value=" '. $sup_arr .'">
//                     </form>
//                    ';
//            $edit = '
//
//                         <button type="submit" name="toggle_edit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
//                         <input type="text" name="toggle_edit" value=" '. $sup_arr .'">
//
//                        ';
            echo "<tr>"
                    . "<td class='text-left'>" . $key['in_name'] . "</td>"
                    . "<td class='text-left'>" . $key['in_auth'] . "</td>"
                    . "<td class='text-left'>" . $key['in_date'] . "</td>"
                    . "<td class='text-left'>" . $edit .  "</td>";
            echo "</tr>";
    }
}


?>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="js/js.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <meta charset="utf-8" />
        <title>Table Style</title>
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, width=device-width">
    </head>

    <body>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
<!--                <a class="navbar-brand" href="#">Brand</a>-->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="books.php">Books<span class="sr-only">(current)</span></a></li>
                    <li><a href="image.php">Image</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                </ul>
                <form class="navbar-form navbar-right">
                    <button type="submit" class="btn btn-default" formaction="logout.php">Logout</button>
                </form>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>






    <!-- Trigger the modal with a button -->


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog" id="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" id="popup">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit <?php echo $b_name . "&nbsp" . $b_auth . "&nbsp" . $b_date ?></h4>
                </div>
                <div class="modal-body">
                    <form id="book-reg" action="books.php" method="post">
                        <div class="container">
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
                                <button type="submit" class="btn btn-default btn-icon" name="action" formaction="update_table.php" value="<?php echo $button_label ?>"><?php echo $button_label ?></button>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
<!--                    <button type="submit" class="btn btn-default btn-icon" data-dismiss="modal" name="action" formaction="update_table.php" value="--><?php //echo $button_label ?><!--">--><?php //echo $button_label ?><!--</button>-->
                </div>
            </div>

        </div>
    </div>










        <div class="table-title">
            <h3>Data Table</h3>
        </div>

        <div class="container">



            <div class="row">
                        <div>
                            <table class="table-fill" id="myTable">
                                <thead>
                                <tr>
                                    <th class="text-left">Book</th>
                                    <th class="text-left">Author</th>
                                    <th class="text-left">Date of publication</th>
                                    <th class="text-left"><button type="submit" class="btn btn-info" data-toggle="modal" data-target="#myModal">Create new</button></th>
                                </tr>
                                </thead>

<!--
                                    <tbody id="main_table">
<!--                                    --><?php //$count!==0 ? add_row($count) : null ?>
                                    <?php $count!==0 ? add_row() : null ?>

                                    </tbody>

                            </table>
                        </div>
                    </div>
        </div>
    </body>

