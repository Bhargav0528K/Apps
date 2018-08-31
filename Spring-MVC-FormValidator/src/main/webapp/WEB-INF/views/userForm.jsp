<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
 <%@taglib uri="http://www.springframework.org/tags/form" prefix="form" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<link rel='stylesheet' href='webjars/bootstrap/3.2.0/css/bootstrap.min.css'>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>THIS IS USER FORM</title>
<style type="text/css">
.error{
color: red;
}
</style>
</head>
<body background="#d24dff">
<center>
<h2>ENTER USER INFORMATION</h2>
<form:form method="post" action="./saveUser" modelAttribute="user">
<table>
<tr>
<td>
<form:label path="userName">userName</form:label></td>
<td><form:input path="userName"/><form:errors path="userName" cssClass="error"/>
</td></tr>
<tr><td>
<form:label path="email">email</form:label></td>
<td><form:input path="email"/><form:errors path="email" cssClass="error"/>
</td></tr>
<tr><td>
<form:label path="password">password</form:label></td>
<td><form:input path="password"/><form:errors path="password" cssClass="error"/>
</td></tr>
<tr><td>
<form:label path="contactNumber">contactNumber</form:label></td>
<td><form:input path="contactNumber"/><form:errors path="contactNumber" cssClass="error"/>
</td></tr>
<tr>
<td>Gender:</td><td><form:radiobutton path="gender" value="Male" label="Male"/>
<form:radiobutton path="gender" value="Female" label="Female"/><form:errors path="gender" cssClass="error"/></td>
</tr>
<tr>
<td colspan="2">
<input type="submit" value="submit">
</td>
</tr>
</table>
</form:form>
<script type="text/javascript" src="webjars/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="webjars/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</center>
</body>
</html>