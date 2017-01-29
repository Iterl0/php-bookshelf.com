/**
 * Created by Iterl on 25.01.2017.
 */


$(function(){
    $('#login-form').on("submit", function() {
        if (!/^[A-Za-z0-9_]{1,20}$/.test($('#username').val()) ||
            !/^[A-Za-z0-9!@#$%^&*()_]{6,20}$/.test($('#password').val())){
            $('#error-log').html("invalid input");
            $('#error-log').toggleClass("error");
            return false
        };

        return true;
    });
});

function insert_cell() {
    var table = window.myTable;
    var row = table.insertRow(1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    cell1.innerHTML = "NEW CELL1";
    cell2.innerHTML = "NEW CELL2";
}
