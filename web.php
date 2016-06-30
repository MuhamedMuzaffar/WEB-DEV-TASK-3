<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SIGNING UP</title>
</head>

<body>
<link type="text/css" rel="stylesheet" href="modern.css" />
<script type="text/javascript">
//to prevent function of backspace
(function(global){if(typeof(global)==="undefined"){thrownewError("window is undefined");}var _hash ="!";
var noBackPlease =function(){global.location.href +="#";// making sure we have the fruit available for juice (^__^)
global.setTimeout(function(){global.location.href +="!";},50);};
global.onhashchange =function(){if(global.location.hash !== _hash){global.location.hash = _hash;}};global.onload =function(){            
        noBackPlease();// disables backspace on page except on input fields and textarea..
        document.body.onkeydown =function(e){var elm = e.target.nodeName.toLowerCase();if(e.which ===8&&(elm !=='input'&& elm  !=='textarea')){
                e.preventDefault();}// stopping event bubbling up the DOM tree..
            e.stopPropagation();};}})(window);
</script>
<link href="webc.css" rel="stylesheet" type="text/css">
<script src="validate.js" type="text/javascript"></script>


<form action="upload.php" method="post" enctype="multipart/form-data" id ="web" onsubmit="return validate(this)"    >
<table  cellspacing="4" cellpadding="3"  id="table">
<caption><b>SIGNING UP</b></caption>
 <tr>
    <td width="143">NAME :</td>
    <td width="220"><input type="text" name="username" id="username"  maxlength="15"/></td>
  </tr>
  <tr>
    <td>PASSWORD:</td>
    <td><input type="password" name="password" id="password" maxlength="15"/></td>
  </tr>
  <tr>
    <td>PROFILE PHOTO : </td>
    <td><input type="file" name="file" id="prof" accept="image/jpeg"/></td>
  </tr>
  <tr>
    <td>EMAIL ID : </td>
    <td><input type="text" name="email"  id="email"/></td>
  </tr>
  <tr>
    <td>PHONE NUMBER: </td>
    <td><input type="text" name="phone" id="phone"  maxlength="10"/></td>
  </tr>
  <tr>
    <td><input name="submit" type="submit" value="SUBMIT"  /></td>
    <td><input name="reset" type="reset" value="RESET" /></td>
  </tr>
</table>
<br/>
</form>
<a href="login.php">
<input id="button" type="button" value="CLICK TO LOGIN"  align="baseline"/>
</a>
</body>
</html>
