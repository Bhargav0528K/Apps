<html>
<head>
<script type='text/javascript'>
window.history.forward();
function noBack() { window.history.forward(); }
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
<script "text/javascript">
function validation()
{
var username="";
var password="";
var name="";
var id="";
var confirmpassword="";
id=document.facultyregister.facultyid.value;
name=document.facultyregister.name.value;
username=document.facultyregister.user.value;
password=document.facultyregister.password.value;
confirmpassword=document.facultyregister.confirmpassword.value;
if(name=="")
{
alert("NAME IS MISSING");
return false;
}
else if(id=="")
{
alert("FACULTY ID IS MISSING");
return false;
}
else if(username="")
{
alert("USER NAME IS MISSING");
return false;
}
else if(password=="")
{
alert("PASSWORD IS MISSING");
return false;
}
else if(confirmpassword!=password)
{
alert("PASSWORD MISMATCH");
return false;
}
}
</script>
</head>
<body onload='noBack();'onpageshow='if (event.persisted) noBack();' onunload=''>
<form name="facultyregister" method="post" onsubmit="return validation()" action="./FacultyRegisterService">
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
<br>
<br>
<br>
<br>
<br>
<h2 align="center">
<a href="./facultylogin.html">ALREADY REGISTERED CLICK HERE</a>
</h2>
<br>
<br>
<table> 
<tr>
<td align='left'  style="padding-left: 100px;"> 
 <font color="blue" size="5">NAME</font>
</td>
  <td align='left'  style="padding-left: 110px;"><font color="blue" size="5"> :</font>
</td>
<td align='left'  style="padding-left: 120px;">
<font color="blue" size="5">
<input type="text" name="name" size="20">
</td>
</tr>
<tr>
<td align='left'  style="padding-left: 100px;"> 
 <font color="blue" size="5">FACULTY &nbsp;ID</font>
</td>
  <td align='left'  style="padding-left: 110px;"><font color="blue" size="5"> :</font>
</td>
<td align='left'  style="padding-left: 120px;">
<font color="blue" size="5">
<input type="text" name="facultyid" size="10">
</td>
</tr>
<tr>
<td align='left'  style="padding-left: 100px;"> 
 <font color="blue" size="5"> BRANCH</font>
</td>
  <td align='left'  style="padding-left: 110px;"><font color="blue" size="5"> :</font>
</td>
<td align='left'  style="padding-left: 120px;">
<font color="blue" size="5"><select name="branch">
			             <option value="cse">COMPUTER SCIENCE AND ENGINEERING</option>
                         <option value="it">INFORMATION TECHNOLOGY</option>
			             <option value="ece">ELECTRICAL AND COMMUNICATION ENGINEERING</option>
                         <option value="eee">ELECTRICAL AND ELECTRONIC ENGINEERING</option>
                         <option value="mec">MECHANICAL ENFINEERING</option>
                         <option value="eie">ELECTRICAL AND INSTRUMENTATION ENGINEERING</option>
                         <option value="civil">CIVIL ENGINEERING</option>
                         <option value="ase">AEROSPACE ENGINEERING</option>
                         <option value="MCA">MASTER IN COMPUTER APPLICATIONS</option>
                         <option value="MBA">MASTER IN BUSINESS APPLICATIONS</option>
             </select>

</font>
</td>
</tr>
</table>
  <p align="center">
<font size="5" color="red">
UserName&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="user" size="20">
<br>
<br>
Password&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;
<input type="password" name="password" size="20">
<br>
<br>
Retype Password&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;
<input type="password" name="confirmpassword" size="20">
<br>
<br>
</font>
<input type="submit" name="submit" value="submit"></p>
<br>
</h6>
<font color="blue" size="5">
<h4 align="center">INCORRECT CREDENTIALS</h4>
</font>
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
<br>
</form>
</body>
<div style="width:1340px;height:50px;padding:0px;border-radius:5px;border:5px ;background-color:green;">
<p align="center"><font size="10" color="white"><i>DOUBTS CLEARANCE SYSTEM</i></font></p>
</div>
</html>