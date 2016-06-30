<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>To check</title>
</head>

<link type="text/css" rel="stylesheet" href="modern.css" />
<?php
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
      $passwor = $_POST['password'];
      $present=' uploads/'.$user.'.jpg';
	  $email = $_POST['email'];
	  $phone = $_POST['phone'];   
	  //validating username  
if($user=="")
die('input username');
if( strlen($user) < 5 || strlen($user) >15)
die('username must be within 5-15 characters');
if(preg_match("/[^A-Za-z0-9\_]/",$user))
die("Invalid Character in Username");
  //validating password
  if($passwor=="")
die('input passsword');
if( strlen($passwor) < 7 || strlen($passwor) >15)
die('Password must be within 7-15 characters');
if(preg_match("/[^A-Za-z0-9]/",$passwor))
die("Invalid Characters in Password");
//validating email
 if($email=="")
die('input email');
if(preg_match("/[^A-Za-z0-9\@\.]/",$email))
die("Invalid Characters in Email");
if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{die('Invalid email format');}
   //validating phonenumber
 if($phone=="")
die('input phone number');
if(strlen($phone)!=10)
die('Phone Number must be 10 digits');
if(preg_match("/[^0-9]/",$phone))
die("Invalid Characters in phone");
if($phone[0]==0)
die("phone number cannot start with zero");   
  //validating image
if($_FILES['file']['error']>0)
die('An error in file');
if($_FILES['file']['size']>3*1024*1024)
die('Filesize greater than 3MB');
if(!getimagesize($_FILES['file']['tmp_name']))
die('Please ensure that ur uploading an image');
if($_FILES['file']['type']!='image/jpeg')
die('unsupported filetype uploaded');
if(!move_uploaded_file($_FILES['file']['tmp_name'],'uploads/'.$user.'.jpg'))
{die("error uploading the file.");}	
  $passwor=hash("sha256",$passwor);	
    
  // Insert our data
  $sql = "INSERT INTO details VALUES ('$user','$passwor','$present','$email',$phone)";
  
  $insert = $conn->query($sql);    
  // Print response from MySQL
 if ($insert === TRUE) {
    echo "New record created successfully";	
	
} else {

    echo "Error: Duplicate Entry <br> Try Signing up again!!!";
}
// Close our connection
  $conn->close();
} ?>
<br><a href="login.php">CLICK TO LOGIN<a>
<body>
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
