function validate(theForm)
{
	
	var reason = "";

  reason += validateUsername(theForm.user);
  reason += validatePassword(theForm.pass);
       
  if (reason != "") {
    alert("Some fields need correction:\n" + reason);
	document.getElementById("user").value="";
	document.getElementById("pass").value="";
    return false;
    }
    return true;
}

function validateUsername(fld) {
    var error = "";
    var illegalChars = /\W/; // allow letters, numbers, and underscores
 
    if (fld.value == "") {
        error = "You didn't enter a username.\n";
    } else if ((fld.value.length <5 ) || (fld.value.length > 15)) {
        error = "The username must be between 8-15 characters.\n";
    } else if (illegalChars.test(fld.value)) {
        error = "The username contains illegal characters.\n";
    } else {
         fld.style.background = 'White';
    } 
    return error;
}


function validatePassword(fld) {
    var error = "";
    
    if (fld.value == "") {
        error = "You didn't enter a password.\n";
   } else if ((fld.value.length < 7) || (fld.value.length > 15)) {
        error = "The password must be between 7-15 characters. \n";
           }else {
        fld.style.background = 'White';
   }
   return error;
}  