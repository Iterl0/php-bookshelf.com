<?php
include('core.php');
print_r($_SESSION);
?>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        </script>
        <script type="text/javascript" src="js/js.js">
        </script>
        <meta charset="utf-8" />
        <title>Table Style</title>
        <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
    </head>

    <body>
        <div class="table-title">
            <h3>Data Table</h3>
        </div>
        <table class="table-fill" id="myTable">
            <thead>
                <tr>
                    <th class="text-left">Book</th>
                    <th class="text-left">Author</th>
                    <th class="text-left">Date of publication</th>
                    <th class="text-left"> </th>
                </tr>
            </thead>
            <button onclick="insert_cell()">Try it</button>
<!--            <tbody>-->
<!--                <tr>-->
<!--                    <td class="text-left">January</td>-->
<!--                    <td class="text-left">$ 50,000.00</td>-->
<!--                    <td class="text-left">$ 50,000.00</td>-->
<!--                    <td class="text-left"></td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="text-left">January</td>-->
<!--                    <td class="text-left">$ 50,000.00</td>-->
<!--                    <td class="text-left">$ 50,000.00</td>-->
<!--                    <td class="text-left"></td>-->
<!--                </tr>-->
<!--            </tbody>-->
        </table>


    </body>

