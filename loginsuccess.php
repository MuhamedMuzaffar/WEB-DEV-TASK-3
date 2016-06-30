<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>YOUR DETAILS</title>

<link type="text/css" rel="stylesheet" href="modern.css" />
</head>
<body>
<?php
session_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$dbname="user"; // Database name
$tblname="details"; // Table name
$myusername=$_SESSION['myusername'] ;
$mypassword=$_SESSION['mypassword'] ;
// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$dbname")or die("cannot select DB");
  $result=mysql_query("SELECT * FROM $tblname WHERE name= '$myusername' and password='$mypassword'") or die (mysql_error());
 $row=mysql_fetch_array($result,MYSQL_NUM);

 ?>
<table width="363" border="0" cellspacing="3" cellpadding="3" id="table">
<caption><b>YOUR DETAILS</b></caption>
  <tr>
    <td width="127">USERNAME:</td>
    <td colspan="2"><input type="text" name="username" value="<?php echo ($row[0]) ; ?>" readonly /></td>
  </tr>
  <tr>
    <td>PASSWORD:</td>
    <td colspan="2"><input type="password" name="password" value="<?php echo ($row[1]) ; ?>"  readonly/></td>
  </tr>
  <tr>
    <td>PROFILE PHOTO: </td>
    <td colspan="2"><input type="image" height="200"  align="top" width="200" name="file" src="<?php echo ($row[2]) ; ?>"  readonly/></td>
  </tr>
  <tr>
    <td>EMAIL ID: </td>
    <td colspan="2"><input type="text" name="email" value="<?php echo ($row[3]) ; ?>" readonly/></td>
  </tr>
  <tr>
    <td>PHONE NUMBER: </td>
    <td colspan="2"><input type="text" name="phone" value="<?php echo ($row[4]) ; ?>" readonly/></td>
  </tr>
  <tr>
    <td><a href="logout.php"> LOGOUT</a></td>
    <td width="34"><a href="edit.php">EDIT</a></td>
    <td width="172"><a href="search.php">SEARCH</a></td>
  </tr>
</table>
<br>
<br >
<br>




<script type="text/javascript">
(function(global){if(typeof(global)==="undefined"){thrownewError("window is undefined");}var _hash ="!";var noBackPlease =function(){global.location.href +="#";// making sure we have the fruit available for juice (^__^)
global.setTimeout(function(){global.location.href +="!";},50);};global.onhashchange =function(){if(global.location.hash !== _hash){global.location.hash = _hash;}};global.onload =function(){            
        noBackPlease();// disables backspace on page except on input fields and textarea..
        document.body.onkeydown =function(e){var elm = e.target.nodeName.toLowerCase();if(e.which ===8&&(elm !=='input'&& elm  !=='textarea')){
                e.preventDefault();}// stopping event bubbling up the DOM tree..
            e.stopPropagation();};}})(window);
</script>

</body>
</html>
