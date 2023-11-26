document.getElementById(ID_FNAME).addEventListener("keyup", ajaxFName);
function ajaxFName() {
    ajaxRealTimeValidation("flname-ajax.php", ID_FNAME, "ajaxFNameMsg");
}
