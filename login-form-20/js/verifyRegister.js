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
    } 

}

