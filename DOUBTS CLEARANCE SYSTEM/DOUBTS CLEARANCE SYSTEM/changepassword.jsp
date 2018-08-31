<html>
<head>

<script type='text/javascript'>
window.history.forward();
function noBack() { window.history.forward(); }
</script>

<script "text/javascript">
function validation()
{
var a="";
var b="";
var c="";
var d="";
a=document.changepassword.oldpassword.value;
b=document.changepassword.newpassword.value;
c=document.changepassword.user.value;
d=document.changepassword.conformpassword.value;
if(c=="")
{
alert("USERNAME IS MISSING");
return false;
}
else if(a=="")
{
alert("OLD PASSWORD IS MISSING");
return false;
}
else if(b=="")
{
alert("NEW PASSWORD IS MISSING");
return false;
}
else if(d=="")
{
alert("CONFORM PASSWORD IS MISSING");
return false;
}
if(b!=d)
{
alert("PASSWORD MISMATCH IN NEW PASSWORD AND CONFIRM PASSWORD");
return false;
}
}
</script>

<style>
html 
{ 
background: url('content.jpg') no-repeat center; 
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}
</style>

</head>

<body onload='noBack();'onpageshow='if (event.persisted) noBack();' onunload=''>

<form name="changepassword" method="post" onsubmit="return validation()" action="./ChangePasswordService">

<div style="height:150px;padding:0px;border-radius:5px;border:5px solid green;background-color:green;">
<img src=logo1.png align=left height=100% >
<br>
<table>
 
 <tr>  
	<td align='center'  style="padding-left: 150px;">
		<font size="5" color="white"><b>LAKIREDDY  BALI REDDY  COLLEGE  OF  ENGINEERING</b></font>  
	</td>
 </tr>

  <tr>
	<td align='center' style="padding-left: 170px;">
		<font size="5" color="white"><i>(Autonomous)</i></font>
	</td>
   </tr>

   <tr>
	<td align='center' style="padding-left: 200px;">
	<font size="5" color="white"><i>NAAC "A" GRADE</i></font>
	</td>
   </tr>

   <tr>
	<td align='center' style="padding-left: 200px;">
		<font size="5" color="white"><i>NBA Accredited, Affliated to JNTUK,Kakinada;ISO 9001:2001 Certified</font>
	</td>
   </tr>

 </table>
</div>
<br>
<h5 align="center">
<font color="blue" size="5">ENTER USERNAME</font>
<font color="blue" size="5">:</font>
<font color="blue" size="5"><input type="text" name="user"></font>
<br><br><br>
<font color="blue" size="5">ENTER OLD PASSWORD</font>
<font color="blue" size="5">:</font>
<font color="blue" size="5"><input type="password" name="oldpassword"></font>
<br><br><br>
<font color="blue" size="5"> ENTER NEW PASSWORD</font>
<font color="blue" size="5">:</font>
<font color="blue" size="5"><input type="password" name="newpassword"></font>
<br><br><br>
<font color="blue" size="5">CONFIRM PASSWORD</font>
<font color="blue" size="5">:</font>
<font color="blue" size="5"><input type="password" name="conformpassword"></font>
<br><br><br>
<input type="submit" name="submit" value="submit"></td>
<br>
<br>
<br>
<br>
 <font color="red" size="5">INCORRECT USERNAME OR PASSWORD
 </font>
 </h5>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</form>

</body>
<br>
<div style="width:1340px;height:50px;padding:0px;border-radius:5px;border:5px;background-color:green;"><p align="center"><font size="10" color="white"><i>DOUBTS CLEARANCE SYSTEM</i></font></p></div>

</html>     