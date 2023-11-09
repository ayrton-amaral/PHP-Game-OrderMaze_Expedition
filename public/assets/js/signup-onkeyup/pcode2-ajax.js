function confirmPassword2() {
    document.getElementById("confirmPasswordMsg").innerHTML = "";
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirmPassword").value;
    var xmlhttp = new AsyncRequest();
    xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4) {
        if (this.status == 200) {
            if (this.responseText != null) {
                document.getElementById("confirmPasswordMsg").innerHTML = this.responseText;
            }
        }
    }
    };
    xmlhttp.open("GET", "pcode2-ajax.php?password=" + password + "&confirmPassword=" + confirmPassword, true);
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