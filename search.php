<html>

<link type="text/css" rel="stylesheet" href="modern.css" />
<title>SEARCH </title><body>
<script type="text/javascript">
function ajaxFunction(str)
{
 var httpxml;
 try
   {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
   }
catch (e)
   {
  // Internet Explorer
  try
    {
    httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    try
      {
      httpxml=new ActiveXObject("Microsoft.XMLHTTP");
      }
    catch (e)
      {
      alert("Your browser does not support AJAX!");
      return false;
      }
    }
  }
function stateChanged() 
    {
    if(httpxml.readyState==4)
      {
document.getElementById("displayDiv").innerHTML=httpxml.responseText;
document.getElementById("msg").style.display='none';

      }
    }
var url="livesearch.php";
url=url+"?txt="+str;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateChanged;
httpxml.open("GET",url,true);
httpxml.send(null);
document.getElementById("msg").innerHTML="Please Wait ...";
document.getElementById("msg").style.display='inline';
}
</script>
</head>
<body>
<div id=msg ></div>
<form name="myForm" >
  
  <table width="250" border="0" cellspacing="2" cellpadding="1" id="table">
  <caption><b>SEARCH HERE </b></caption>
    <tr>
      <td><input type="text" onKeyUp="ajaxFunction(this.value);" name="username" /></td>
    </tr>
    <tr>
      <td><div id="displayDiv">SEARCH RESULTS HERE</div></td>
    </tr>
    <tr>
      <td><a href="loginsuccess.php">CLICK TO GO BACK</a></td>
    </tr>
  </table> 

</form>


</body>
</html>