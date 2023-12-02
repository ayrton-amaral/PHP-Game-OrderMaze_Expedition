document.getElementById(ID_PASSWORD).addEventListener("keyup", ajaxPassword);

function ajaxPassword() {
    ajaxRealTimeValidation("pcode1-ajax.php", ID_PASSWORD, "ajaxPasswordMsg");
    ajaxConfirmPassword();
}