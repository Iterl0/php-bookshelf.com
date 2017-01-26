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



