var pw = document.getElementById("pswd").value;
var veripw = document.getElementById("verifypswd").value;


$(document).ready(function() {
    $('.pass_show').append('<span class="ptxt">Show</span>');
});


$(document).on('click', '.pass_show .ptxt', function() {

    $(this).text($(this).text() == "Show" ? "Hide" : "Show");

    $(this).prev().attr('type', function(index, attr) { return attr == 'password' ? 'text' : 'password'; });

});

function veripass() {
    if (pw != veripw) {
        alert("**Passwords must be the same");
        return false;
    }
}