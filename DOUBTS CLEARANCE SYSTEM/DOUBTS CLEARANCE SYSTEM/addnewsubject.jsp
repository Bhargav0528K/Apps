<html>

<head>

<script type='text/javascript'>
window.history.forward();
function noBack() { window.history.forward(); }
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

<script "text/javascript">
function validation()
{
var a="";
var b="";
a=document.addnewsubject.newsubjectname.value;
b=document.addnewsubject.newsubjectcode.value;
if(a=="")
{
alert("NEW SUBJECT NAME IS MISSING");
return false;
}
else if(b=="")
{
alert("SUBJECT CODE IS MISSING");
return false;
}
else if(b.length>4)
{
alert("INVALID SUBJECT CODE");
return false;
}
}
</script>

</head>

<body onload='noBack();'onpageshow='if (event.persisted) noBack();' onunload=''>

<form name="addnewsubject" method="post" onsubmit="return validation()" action="./AddNewSubjectService">

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
<br><br><br><br><br>
<table> 
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
<tr>
<td align='left'  style="padding-left: 100px;"> 
 <font color="blue" size="5">SEMESTER</font>
</td>
  <td align='left'  style="padding-left: 110px;"><font color="blue" size="5"> :</font>
</td>
<td align='left'  style="padding-left: 120px;">
<font color="blue" size="5"><select name="semester">
			             <option value="first">FIRST SEMESTER</option>
                         <option value="second">SECOND SEMESTER</option>
			             <option value="third">THIRD SEMESTER</option>
                         <option value="fourth">FOURTH SEMESTER</option>
                         <option value="fifth">FIFTH SEMESTER</option>
                         <option value="sixth">SIXTH SEMESTER</option>
                         <option value="seventh">SEVENTH SEMESTER</option>
                         <option value="eight">EIGTH SEMESTER</option>
                         </select>

</font>
</td>
</tr>
</table>
<br>
<table>
<tr>
<td align='left'  style="padding-left: 100px;">				  
<font color="red" size="5">ENTER NEW SUBJECT NAME</font>
</td>
<td align='left'  style="padding-left: 100px;">
<font color="red" size="5">:</font>
</td>
<td align='left'  style="padding-left: 100px;">
<font color="red" size="5"><input type="text" name="newsubjectname"></font>
</td>				  
</tr>
<tr>
<td align='left'  style="padding-left: 100px;">				  
<font color="red" size="5">ENTER NEW SUBJECT CODE</font>
</td>
<td align='left'  style="padding-left: 100px;">
<font color="red" size="5">:</font>
</td>
<td align='left'  style="padding-left: 100px;">
<font color="red" size="5"><input type="text" name="newsubjectcode"></font>
</td>				  
</tr>
</table>
<br>
<table>
<tr>
 <td align='left'  style="padding-left: 300px;"> <input type="submit" name="submit" value="submit"></td>
</tr>
</table>
<br>
<p align='center'>
<font color="blue" size="5">INVALID SELECTION</font>
</p>
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
<div style="width:1340px;height:50px;padding:0px;border-radius:5px;border:5px #AF23A5;background-color:green;"><p align="center"><font size="10" color="white"><i>DOUBTS CLEARANCE SYSTEM</i></font></p></div>

</html>