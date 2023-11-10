const URL = window.location.origin;
const AJAX_URL = URL + "/php-final-project/src/signup-onkeyup/pcode2-ajax.php";

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
    xmlhttp.open("GET", AJAX_URL + queryParam, true);
    xmlhttp.send();

  }

function AsyncRequest() {
    try {
      var request = new XMLHttpRequest();
    } 
    catch (e1) {
      try {
        request = new ActiveXObject("Msxml2.XMLHTTP");
      }
      catch (e2) {
        try {
          request = new ActiveXObject("Microsoft.XMLHTTP");
        } 
        catch (e3) 
        {
          alert("Your browser does not support AJAX!");
          request = false;
        }
      }
    }
    return request;
  }
  