document.getElementById(ID_C_PASSWORD).addEventListener("keyup", ajaxConfirmPassword);

function ajaxConfirmPassword() {
  let password =  document.getElementById(ID_PASSWORD).value;
  let confirmPassword =  document.getElementById(ID_C_PASSWORD).value;

  var xmlhttp = new AsyncRequest();

  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText != null) {
        document.getElementById(ID_C_PASSWORD).classList.add("is-invalid")
        document.getElementById(ID_C_PASSWORD).classList.remove("is-valid")
        document.getElementById("ajaxConfirmPasswordMsg").innerHTML = this.responseText;
      }

      if(this.responseText == "") {
        document.getElementById(ID_C_PASSWORD).classList.remove("is-invalid")
        document.getElementById(ID_C_PASSWORD).classList.add("is-valid")
        document.getElementById("ajaxConfirmPasswordMsg").innerHTML = "";
      }
    }
  };

  let queryParam = "?password="+password+"&confirmPassword="+confirmPassword;
  
  xmlhttp.open("GET", AJAX_URL + "pcode2-ajax.php" + queryParam, true);
  xmlhttp.send();
}