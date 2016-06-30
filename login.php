<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>LOGIN</title>
</head>

<body >

<link type="text/css" rel="stylesheet" href="modern.css" />
<script type="text/javascript">
//to prevent function of backspace
(function(global){if(typeof(global)==="undefined"){thrownewError("window is undefined");}
var _hash ="!";
var noBackPlease =function(){global.location.href +="#";// making sure we have the fruit available for juice (^__^)
global.setTimeout(function(){global.location.href +="!";},50);};
global.onhashchange =function(){if(global.location.hash !== _hash){global.location.hash = _hash;}};
global.onload =function(){            
        noBackPlease();// disables backspace on page except on input fields and textarea..
        document.body.onkeydown =function(e){var elm = e.target.nodeName.toLowerCase();
		if(e.which ===8&&(elm !=='input'&& elm  !=='textarea')){
                e.preventDefault();}// stopping event bubbling up the DOM tree..
            e.stopPropagation();};}})(window);
</script>
<script src="vallogin.js" type="text/javascript"></script>
<form method="post" enctype="multipart/form-data" action="login.php" onsubmit="return validate(this)"/>
  <table border="0" cellpadding="3" cellspacing="3" id="table">
  <caption><b>LOGIN</b></caption>
    <tr>
      <td>USERNAME : </td>
      <td><input type="text" name="loginuser" id="user" /></td>
    </tr>
    <tr>
      <td>PASSWORD:</td>
      <td><input type="password" name="loginpass" id="pass"/></td>
    </tr>
    <tr>
      <td><input name="submit" type="submit" value="LOGIN"  /></td>
      <td><a href="web.php">
        <input name="button" type="button" value="CLICK TO GO BACK TO SIGN UP" />
      </a></td>
    </tr>
  </table>
<br/>
</form><?php
if(!empty($_POST)){
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="user"; // Database name
$tbl_name="details"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form
$myusername=$_POST['loginuser'];
$mypassword=$_POST['loginpass'];

// To protect MySQL injection 
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

//validating username
if( strlen($myusername) < 5 || strlen($myusername) >15)
die('username must be within 5-15 characters');
if(preg_match("/[^A-Za-z0-9\_]/",$myusername))
die("Invalid Character in Username");
  //validating password
  if($mypassword=="")
  die("Enter the Password");
if( strlen($mypassword) < 7 || strlen($mypassword) >15)
die('Password must be within 7-15 characters');
if(preg_match("/[^A-Za-z0-9]/",$mypassword))
die("Invalid Characters in Password");
$mypassword=hash("sha256",$mypassword);

  $result=mysql_query("SELECT * FROM $tbl_name WHERE name= '$myusername' and password='$mypassword'") or die (mysql_error());
 
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
session_start();
$_SESSION['myusername'] = $myusername;
$_SESSION['mypassword'] = $mypassword;
//session_register("myusername");
//session_register("mypassword");

header("location:loginsuccess.php");

}
else {
echo "Wrong Username or Password";
}
}
else {
echo "Enter Username and Password";
}?>
</body>
</html>

