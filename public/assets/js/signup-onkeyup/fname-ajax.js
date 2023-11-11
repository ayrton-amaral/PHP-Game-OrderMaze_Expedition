function ajaxFName() {
    document.getElementById("ajaxFNameMsg").innerHTML = "";
    let fname = document.getElementById("fname").value;
    var xmlhttp = new AsyncRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                if (this.responseText != null) {
                    document.getElementById("ajaxFNameMsg").innerHTML = this.responseText;
                }
            }
        }
    };
    let queryParam = "?flname=" + fname;
    xmlhttp.open("GET", AJAX_URL + "flname-ajax.php" + queryParam, true);
    xmlhttp.send();

}
