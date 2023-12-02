document.getElementById(ID_USERNAME).addEventListener("keyup", ajaxUsername);

function ajaxUsername() {
    ajaxRealTimeValidation("username-pw-ajax.php", ID_USERNAME, "ajaxUsernameMsg");
}