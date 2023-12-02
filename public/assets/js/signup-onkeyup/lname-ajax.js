document.getElementById(ID_LNAME).addEventListener("keyup", ajaxLName);

function ajaxLName() {
    ajaxRealTimeValidation("flname-ajax.php", ID_LNAME, "ajaxLNameMsg");
}