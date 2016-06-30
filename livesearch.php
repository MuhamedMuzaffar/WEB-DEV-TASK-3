<?php
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="user"; // Database name
$tbl_name="details"; // Table name
// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
$in= $_GET['txt'];
if(!ctype_alnum($in)){
echo "Enter Data";
exit;
}
if(strlen($in)>0 and strlen($in) <20 ){
$sql="select * from details WHERE name like '%$in%'";
$result=mysql_query($sql);
if(mysql_num_rows($result)==0)
echo " NOT EXISTING"; 
$row=mysql_fetch_array($result,MYSQL_NUM);
echo $row[0];
}
?>