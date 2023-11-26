const URL = window.location.origin;
const AJAX_URL = URL + "/php-final-project/src/signup-onkeyup/";
const ID_FNAME = "fname";
const ID_LNAME = "lname";
const ID_USERNAME = "username";
const ID_PASSWORD = "floatingPassword";
const ID_C_PASSWORD = "floatingConfirmPassword";

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

function ajaxRealTimeValidation(phpFileName, inputId, feedbackPlace) {
  let text_value = document.getElementById(inputId).value;
  var xmlhttp = new AsyncRequest();
  xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText != null) {
          document.getElementById(inputId).classList.remove("is-valid")
          document.getElementById(inputId).classList.add("is-invalid")
          document.getElementById(feedbackPlace).innerHTML = this.responseText;
        }
        if(this.responseText == "") {
            document.getElementById(inputId).classList.remove("is-invalid")
            document.getElementById(inputId).classList.add("is-valid")
            document.getElementById(feedbackPlace).innerHTML = "";
        }
      }
  };
  xmlhttp.open("GET", `${AJAX_URL}${phpFileName}?text=${text_value}`, true);
  xmlhttp.send();
}