$(document).ready(function () {

    $("#show-pass").on('click', function(e) {
        let x = $('#password')[0];
        if (x.type === "password") {
            x.type = "text";
            $('#icon-show-pass').removeClass('fa-eye');
            $('#icon-show-pass').addClass('fa-eye-slash');
        } else {
            x.type = "password";
            $('#icon-show-pass').removeClass('fa-eye-slash');
            $('#icon-show-pass').addClass('fa-eye');
        }
    });
});