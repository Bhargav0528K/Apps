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
a=document.facultylogin.user.value;
b=document.facultylogin.password.value;
if(a=="")
{
alert("USERNAME IS MISSING");
return false;
}
else if(b=="")
{
alert("PASSWORD IS MISSING");
return false;
}
}
</script>
<style>

html { 
        background: url('content.jpg') no-repeat center; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
}
</style>
</head>
<body onload='noBack();'onpageshow='if (event.persisted) noBack();' onunload=''>

<form name="facultylogin" method="post" onsubmit="return validation()" action="./FacultyLoginService">

<div style="height:150px;padding:0px;border-radius:5px;border:5px solid green;background-color:green;">
<img src=logo1.png align=left height=100% >
</br>
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
<br>
<br>
<br>
<br>
<h6 align="center">
<font size="5" color="red">
UserName&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="user" size="20">
<br>
<br>
Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;
<input type="password" name="password" size="20">
<br>
<br>
</font>
<p align="center">
<input type="submit" name="submit" value="submit"></p>
<br>
<br>
<br>
<font size="5" color="blue">
INCORRECT USERNAME OR PASSWORD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</font>
</h6>
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
<div style="width:1340px;height:50px;padding:0px;border-radius:5px;border:5px;background-color:green;">
<p align="center"><font size="10" color="white"><i>DOUBTS CLEARANCE SYSTEM</i></font></p>
</div>
</html>