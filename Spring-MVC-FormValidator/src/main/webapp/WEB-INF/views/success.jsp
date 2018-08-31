<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<%@page isELIgnored="false"%>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<link rel='stylesheet' href='webjars/bootstrap/3.2.0/css/bootstrap.min.css'>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>This is success page</title>
</head>
<body>
<center>
<table>
<tr>
<th>userName</th>
<td>: ${user.userName}</td>
</tr>
<tr>
<th>email</th>
<td>: ${user.email}</td>
</tr>
<tr>
<th>password</th>
<td>: ${user.password}</td>
</tr>
<tr>
<th>gender</th>
<td>: ${user.gender}</td>
</tr>
<tr>
<th>contactNumber</th
><td>: ${user.contactNumber}</td>
</tr>
</table>
<script type="text/javascript" src="webjars/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="webjars/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</center>
</body>
</html>