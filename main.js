function hide(){
  document.getElementById("reg").style.display = "none";
  document.getElementById("lg").style.display = "block";
}
setInterval(function myFunction() {
    var myobj = document.getElementById("me");
    myobj.remove();
    document.getElementById("fm").reset();
  }, 5000);
 
  function check_pass() {
    if (
      document.getElementById("password").value ==
      document.getElementById("pw1").value
    ) {
      document.getElementById("submit").disabled = false;
      document.getElementById("error-message").style.display = "none"
    } else {
      document.getElementById("submit").disabled = true;
      document.getElementById("error-message").innerHTML="unmatched password";
      document.getElementById("error-message").style.display = "block";
    }
  }
  function show(){
    document.getElementById("lg").style.display = "none";
    document.getElementById("reg").style.display = "block";
  }
 

    