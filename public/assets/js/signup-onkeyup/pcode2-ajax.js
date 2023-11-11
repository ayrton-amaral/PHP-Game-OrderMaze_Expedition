function ajaxConfirmPassword() {
    document.getElementById("ajaxConfirmPasswordMsg").innerHTML = "";
    let password =  document.getElementById("floatingPassword").value;
    let confirmPassword =  document.getElementById("floatingConfirmPassword").value;
    var xmlhttp = new AsyncRequest();
    xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4) {
        if (this.status == 200) {
            if (this.responseText != null) {
                document.getElementById("ajaxConfirmPasswordMsg").innerHTML = this.responseText;
            }
        }
    }
    };
    let queryParam = "?password="+password+"&confirmPassword="+confirmPassword;
    xmlhttp.open("GET", AJAX_URL + "pcode2-ajax.php" + queryParam, true);
    xmlhttp.send();

  }