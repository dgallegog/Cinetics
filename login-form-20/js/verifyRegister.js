function isValidForm() {
    var pw = document.getElementById("pswd").value;
    var veripw = document.getElementById("verifypsw").value;
    //check empty password field  
    if (pw == "") {
        alert("**Fill the password please!");
        return false;
    } else if (pw != veripw) {
        alert("**Passwords must be the same");
        return false;

    } else if (pw.length < 8) {
        alert("**Password length must be atleast 8 characters");
        return false;
    } else if (pw.length > 15) {
        alert("**Password length must not exceed 15 characters");
        return false;
    } else if (validateEmail(document.getElementById("email").value)) {
        alert("**Wrong mail format");
        return false;
    }

}

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}