var user=0 ,pass=0, email=0,phone=0;
function validate(theForm)
{
  var reason = "";
  reason += validateUsername(theForm.username);
  reason += validatePassword(theForm.password);
  reason += validateEmail(theForm.email);
  reason += validatePhone(theForm.phone);
      
  if (reason != "")  {
    alert("Some fields need correction:\n" + reason);
	if(user==1)document.getElementById("username").value=="";
	if(pass==1)document.getElementById("password").value=="";
	if(email==1)document.getElementById("email").value=="";
	if(phone==1)document.getElementById("phone").value=="";
    return false;
                     }
    return true;
}


function validatePassword(fld){
	var error = "";
    var illegalChars = /[\W_]/; // allow only letters and numbers 
 
    if (fld.value == "") {
        error = "You didn't enter a password.\n";pass=1;
    } else if ((fld.value.length < 7) || (fld.value.length > 15)) {
        error = "The password must be between 7-15 characters. \n";
        pass=1;
    } else if (illegalChars.test(fld.value)) {
        error = "The password contains illegal characters.\n";
        pass=1;
    }  else {
        fld.style.background = 'White';
    }
   return error;
	
	}
	function trim(s)
{
  return s.replace(/^\s+|\s+$/, '');
} 

function validateEmail(fld){var error="";
    var tfld = trim(fld.value);                        // value of field with whitespace trimmed off
    var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
    var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
    
    if (fld.value == "") {
        email=1;
        error = "You didn't enter an email address.\n";
    } else if (!emailFilter.test(tfld)) {              //test email for illegal characters
                error = "Please enter a valid email address.\n";email=1;
    } else if (fld.value.match(illegalChars)) {
        email=1;
        error = "The email address contains illegal characters.\n";
    } else {
        fld.style.background = 'White';
    }
    return error;}
	 
 function validatePhone(fld){var error = "";
    var stripped = fld.value.replace(/[\(\)\.\-\ ]/g, '');     

   if (fld.value == "") {
        error = "You didn't enter a phone number.\n";
           phone=1;
    } else if (isNaN(parseInt(stripped))) {
        error = "The phone number contains illegal characters.\n";
        phone=1;
    } else if (!(stripped.length == 10)) {
        error = "The phone number is the wrong length. Make sure you included an area code.\n";
        phone=1;
    } 
    return error;}

function validateUsername(fld) {
    var error = "";
    var illegalChars = /\W/; // allow letters, numbers, and underscores 
    
    if (fld.value == "") {
        user=1;
        error = "You didn't enter a username.\n";
    } else if ((fld.value.length < 5) || (fld.value.length > 15)) {
        user=1;
        error = "The username is the wrong length.\n";
    } else if (illegalChars.test(fld.value)) {
        user=1;
        error = "The username contains illegal characters.\n";
    } else {
        fld.style.background = 'White';
    } 
	
    return error;
}	