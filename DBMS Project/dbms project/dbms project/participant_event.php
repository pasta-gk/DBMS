
 <?php 
//Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
// Code to be executed when 'View The Participants' is clicked. 
if ($_POST['submit'] == 'View The Participants') 
{ 
if($_POST['name'] && $_POST['date']) 
{ 
require('menu.php'); 
//Connect to mysql server 
$link = mysql_connect('localhost', 'garima', 'garima'); 
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server: ' . mysql_error()); 
} 
//Select database 
$db = mysql_select_db('garima'); 
if(!$db){ 
die("Unable to select database"); 
} 
//Prepare query 
$name = $_POST['name']; 
$date = $_POST['date']; 
$query = "select student.student-id,student.name,student.fname,student.village
from student,participate
where participate.name='$name' and
      participate.date='$date' and
      participate.student_id=student.student_id";
//Execute query 
$result = mysql_query($query); 
echo "<center><h1>The Students Who Participated In The Event:'$name' On Date:'$date' Are:-</h1>"; 
echo "<table border='1' cellpadding = '10'> 
<tr><th>Student ID</th> 
<th>Student Name</th> 
<tr><th>Father Name</th> 
<th>Village</th> 
</tr>"; 

while($row = mysql_fetch_array($result)) 
 
{ 
echo "<tr><td>" . $row['student.student_id'] . "</td> 
<td>" . $row['student.name']."</td>
<td>" . $row['student.fname']."</td>
<td>" . $row['student.village']."</td>
</tr>"; 
echo "<br/>"; 
} 
echo "</table></center>"; 
} 
 echo '<a href="volunteer_front_page.php">Back To Volunteer Main Page</a>'; 
 
}
 
 
} 
else{ 
header('location:login_form.php'); 
exit(); 
} 
?>
