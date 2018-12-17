<?php
$id = 'garima';
$pass ='garima';
$database = 'jagrati';
if($_POST['submit']=='Reset Password')
    {
        //if user has forgotten password he can reset his password 
        $username = $_POST['username'] ;
        $name = $_POST['name'];
        //variable contact is to store contact number of the volunteer
        $contact_number =$_POST['contact_number'];
     $new_password =$_POST['new_password'];
        
        //check if username is entered 
        if($username && $name && $contact_number && $new_password)
        {
            //establish link to the database 
            $link = mysql_connect('localhost',$id,$pass);
            //check if link is established
            if(!$link)
            {
                die('Failed to connect to server: '.mysql_error());
            }
            $db = mysql_selectdb ($database);
            //check if database is selected
            if(!$db)
            {
                die('Failed to connect to database : '.mysql_error());
            }
            //check login details - username 
            $query = "SELECT roll_number FROM volunteer WHERE roll_number = $username" ;
            //check if the given username exists 
            $check_user = mysql_query($query);
            
            //if username doesn't exist
            if(!$check_query)
            {
                //redirect to login page (new) with a message that says username or password is incorrect
                include('login_form.php');
                
            }
            //check name and contact number to reset password 
            $query_1 = "SELECT name FROM volunteer WHERE roll_number = $username";
            $query_2 = "SELECT contact_number FROM volunteer WHERE roll_number = $username";
            
            $result_name = mysql_query($query_1);
            $result_contact = mysql_query($query_2);
            
            if(($result_name == $name) && ($result_contact == $contact_number));
            {
                $query = "UPDATE login SET password='$new_password' WHERE username = $username";
                $result = mysql_query($query);
                if(!$result)
                {
                    die("Couldn't update password".mysql_error() );
                }
            }
         
        }

        else
        {
            //redirect to login page
            include('login_form.php');
        }
}
    
?>