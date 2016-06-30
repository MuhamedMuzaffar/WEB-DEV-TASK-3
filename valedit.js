var phone=0;
function validate(theForm)
{
    var reason = "";
    reason += validatePassword(theForm.password);
    reason += validatePhone(theForm.phone);
    if(reason != "") {
    alert("Some fields need correction:\n" + reason);
	if(phone==1){document.getElementById("phone").value="  ";}
    return false;
                    }
  return true;
}
	function validatePassword(fld) {
    var error = "";
    var illegalChars = /[\W_]/; // allow only letters and numbers 
    if(fld.value.length != 64){
    if (fld.value == "") {
        error = "You didn't enter a password.\n";
    } else if ((fld.value.length < 7) || (fld.value.length > 15)) {
        error = "The password must be 7-15. \n";
	}else if (illegalChars.test(fld.value)) {
        error = "The password contains illegal characters.\n";
    }else{} 
    }
   return error;
}  



function validatePhone(fld) {
    var error = "";
    var stripped = fld.value.replace(/[\(\)\.\-\ ]/g, '');     

   if (fld.value == "") {
        error = "You didn't enter a phone number.\n";
       phone=1;
    } else if (isNaN((stripped))) {
        error = "The phone number contains illegal characters.\n";
        phone=1;
    } else if (!(stripped.length == 10)) {
        error = "The phone number is the wrong length. Make sure you included an area code.\n";
        phone=1;
    } else
	   phone =0;
    return error;
}



	
	
	