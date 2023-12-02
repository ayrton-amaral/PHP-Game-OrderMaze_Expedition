document.getElementById(ID_USERNAME).addEventListener("keyup", ajaxUsername);

function ajaxUsername() {
    ajaxRealTimeValidation("uname-ajax.php", ID_USERNAME, "ajaxUsernameMsg");
}