<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>To check</title>
</head>

<link type="text/css" rel="stylesheet" href="modern.css" />
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user"; 
// Check connection
// Only process the form if $_POST isn't empty
if (!empty( $_POST ) ) {
  
  // Connect to MySQL
 $conn = new mysqli("$servername", "$username", "$password","$dbname");
  
  // Check our connection
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
     
      $user = $_POST['username'];
	  $check=0;
	  //validating password
	  if($_POST['password'] == $_SESSION['mypassword']){
      $passwor = $_SESSION['mypassword'];
      }
	  else{
	  $check=1;  //on changing password u will redirected to signup page
	  if(strlen($_POST['password']) < 5 || strlen($_POST['password']) >15)
	       {die( "Password must be 7-15 characters");  }
	  if(preg_match("/[^A-Za-z0-9]/",$_POST['password']))
           {die("Invalid Characters in Password"); }
	  $passwor = hash("sha256",$_POST['password']); }
	  $present=' uploads/'.$user.'.jpg';
	  $email = $_POST['email'];
	  $phone = $_POST['phone'];     
	  //validating phone number
	   if(strlen($_POST['phone']) !=10)
	   {die( "Phone number must be 10 characters");  }
	   if(preg_match("/[^0-9]/",$_POST['phone']))
       {die("Invalid Characters in Phone"); }
	   if($_POST['phone'][0]==0)
	   {die("Phone number cannot start with zero");}   
	  
	  
	  if($_FILES['newimg']['size']!=0){
if($_FILES['newimg']['error']>0)
die('An error occured while uploading');
if($_FILES['newimg']['size']>3*1024*1024)
die('Filesize greater than 3MB');
if(!getimagesize($_FILES['newimg']['tmp_name']))
die('Please ensure that ur uploading an image');
if($_FILES['newimg']['type']!='image/jpeg')
die('unsupported filetype uploaded');
if(!move_uploaded_file($_FILES['newimg']['tmp_name'],'uploads/'.$user.'.jpg'))
{die("error uploading the file.");}
	
}
  // Insert our data
  $sql = "UPDATE details SET password='$passwor', picture='$present', phone='$phone' WHERE name='$user'";
  $update = $conn->query($sql);    
  // Print response from MySQL
 if ($update === TRUE) {
    echo "Updated record created successfully";	
	if($check ==1)
	header("location:logout.php");
	} else {
    echo  " Phone Number already exists";
}
// Close our connection
  $conn->close();
} ?>
<br><a  href="logout.php">CLICK TO LOGOUT</a>
<br><a  href="loginsuccess.php">CLICK TO SEE DETAILS</a>

<body>
<script type="text/javascript">
(function(global){if(typeof(global)==="undefined"){thrownewError("window is undefined");}var _hash ="!";var noBackPlease =function(){global.location.href +="#";// making sure we have the fruit available for juice (^__^)
global.setTimeout(function(){global.location.href +="!";},50);};global.onhashchange =function(){if(global.location.hash !== _hash){global.location.hash = _hash;}};global.onload =function(){            
        noBackPlease();// disables backspace on page except on input fields and textarea..
        document.body.onkeydown =function(e){var elm = e.target.nodeName.toLowerCase();if(e.which ===8&&(elm !=='input'&& elm  !=='textarea')){
                e.preventDefault();}// stopping event bubbling up the DOM tree..
            e.stopPropagation();};}})(window);
</script></body>
</html>
