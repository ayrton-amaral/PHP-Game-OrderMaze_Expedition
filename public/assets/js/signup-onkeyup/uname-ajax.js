function ajaxUsername() {
    document.getElementById("ajaxUsernameMsg").innerHTML = "";
    let username = document.getElementById("username").value;
    var xmlhttp = new AsyncRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                if (this.responseText != null) {
                    document.getElementById("ajaxUsernameMsg").innerHTML = this.responseText;
                }
            }
        }
    };
    let queryParam = "?username=" + username;
    xmlhttp.open("GET", AJAX_URL + "uname-ajax.php" + queryParam, true);
    xmlhttp.send();

}
