
 
<?php 
session_start(); 
session_unset(); 
session_destroy(); 
?> 
<html> 
<head> 
<title>Login Page</title> 
</head> 
<body> 
<h1 align="center"> -  Jagrati insights - </h1> 
<form name="volunteer_main_page" method="post" action="get_details.php"> 
<table width="300" border="1" align="center" cellpadding="5" cellspacing="0"> 
<tr> 
<td><input type="submit" name="submit" value="About Our Volunteers" />></td> 
</tr>
<tr> 
<td><input type="submit" name="submit" value="About Our Students" />></td> 
</tr>
<tr> 
<td><input type="submit" name="submit" value="About Our Events" />></td> 
</tr>
<tr> 
<td><input type="submit" name="submit" value="About Our Donations" />></td> 
</tr>
<tr> 
<td><input type="submit" name="submit" value="Our Time-Table" />></td> 
</tr>
</body> 
</html>
