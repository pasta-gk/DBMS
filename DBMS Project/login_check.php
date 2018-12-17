<?php 
//define login_id and password of the database here so that it can be changed easily 
$id = 'revatim';
$pass ='revatim';
$database = 'jagriti';
//check if user has pressed submit button 
//value of submit button is login
if ($_POST['submit']=='login')
{
    // store username and password in variables 
    //method of getting data - text input - post method
    $username = $_POST['username'] ;
    $password = $_POST['password'] ;
    // check if both username and password have been entered 
    if($username && $password )
    {
        $link = mysql_connect('localhost', $id ,$pass); 
        //check if link is established 
        if(!$link) 
        { 
            //if link not established the program should die
            die('Failed to connect to server: ' . mysql_error()); 
        } 
        //select database
        $db = mysql_select_db ($database) ;
        //check if the database has been selected 
        if (!$db)
        {
            //if not connected to database program should die
            die('Falied to connect to database:  '.mysql_error());
        }
        //check login details 
        $query = "SELECT roll_number FROM volunteer WHERE roll_number = $username" ;
        //check if the given username exists 
        $check_user = mysql_query($query);
        //if username doesn't exist

        if(!$check_query)
        {
            //redirect to login page (new) with a message that says username or password is incorrect
            include('login_form.php');

        }
        
        //check username and password from table
        $query = "SELECT password FROM login WHERE roll_number = $username ";
        $check_user = mysql_query($query);
        
        //check if username and password match 
        if($password == $check_user)
        {
            //if they match redirect to the volunteer main page 
            
        }
        else
        {
            //if they dont match redirect to login page (new) that says username or password is incorrect 
            include('login_form.php');
            
        }
    }
    else if($_POST['submit']=='forgot password')
    {
        //if user has forgotten password he can reset his password 
        $username = $_POST['username'] ;
        $name = $_POST['name'];
        //variable contact is to store contact number of the volunteer
        $contact =$_POST['contact'];
        
        //check if username is entered 
        if($username && $name && $contact)
        {
            //establish link to the database 
            $link = mysql_connect('localhost',$id,$pass);
            //check if link is established
            if(!$link)
            {
                die('Failed to connect to server: ',mysql_error());
            }
            $db = mysql_selectdb ($database);
            //check if database is selected
            if(!$db)
            {
                die('Failed to connect to database : ',mysql_error());
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
            
            if(($result_name == $name) && ($result_contact == $contact));
            {
                $query = "UPDATE password FROM login WHERE roll_number = $username";
                $result = mysql_query($query);
                if(!$result)
                {
                    die("Couldn't update passsword", mysql_error() );
                }
            }
            else
            {
                //the data entered was incorrect 
                //redirect to login page 
            }
        }
        else
        {
            //redirect to login page
        }
    }
    else
    {
        //redirect to login page (new) and display message that says username or password is incorrect 
        
    }
}
?>