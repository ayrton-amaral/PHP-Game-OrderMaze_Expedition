function ajaxPassword() {
    document.getElementById("ajaxPasswordMsg").innerHTML = "";
    let password = document.getElementById("floatingPassword").value;
    var xmlhttp = new AsyncRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                if (this.responseText != null) {
                    document.getElementById("ajaxPasswordMsg").innerHTML = this.responseText;
                }
            }
        }
        ajaxConfirmPassword()
    };
    let queryParam = "?password=" + password;
    xmlhttp.open("GET", AJAX_URL + "pcode1-ajax.php" + queryParam, true);
    xmlhttp.send();

}