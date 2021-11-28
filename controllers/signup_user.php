<?php

    // Optional: For Successful registration notification only (CSS)
/*    $registered = false;
    if (isset($_GET['registered']))
        $registered = $_GET['registered'];*/

    // For CSS use only
    $invalid_fname            = "";
    $invalid_lname            = "";
    $invalid_email_signup     = "";  
    $invalid_password_signup  = "";
    $invalid_confirm_password = "";

    // For validation of credentials
    $invalid_credentials_signup = false;

    // Credentials value: By default set to empty string
    $fname                  = "";
    $lname                  = "";
    $email_signup           = "";
    $password_signup        = "";
    $confirm_password       = "";

    /*
     *  Checks if the request is POST request 
     *  triggered when you login button
     */

   
    if(isset($_POST['signup_btn']))
    {
        $conn = new mysqli("localhost", "root", "", "badboyskusinadb");
        // Set cedentials
        $fname            = $conn -> real_escape_string($_POST['fname']);
        $lname            = $conn -> real_escape_string($_POST['lname']);
        $email_signup     = $conn -> real_escape_string($_POST['email_signup']);
        $password_signup  = $_POST['password_signup'];
        $confirm_password = $_POST['confirm_password'];

        // default value every post request/login button click event
        $invalid_credentials_signup = false;

        // Check if  all fields are empty
        if (empty($fname) || empty($lname) || empty($email_signup) || empty($password_signup) || empty($confirm_password))
        {
            // apply CSS style if firstname is empty
            if (empty($fname))
                $invalid_fname = 'is-invalid';

            // apply CSS style if lastname is empty
            if (empty($lname)) 
                $invalid_lname = 'is-invalid';

            // apply CSS style if email is empty
            if (empty($email_signup))
                $invalid_email_signup= 'is-invalid';

            // apply CSS style if password is empty
            if (empty($password_signup))
                $invalid_password_signup = 'is-invalid';

            
            // apply CSS style if retype password is empty
            if (empty($confirm_password))
                $invalid_confirm_password = 'is-invalid';

        }

        else if(!preg_match("/^[a-zA-Z ]*$/", $fname)) 
            $invalid_fname = 'is-invalid';
        
        else if(!preg_match("/^[a-zA-Z ]*$/", $lname)) 
            $invalid_lname = 'is-invalid';
        
        else if(!filter_var($email_signup, FILTER_VALIDATE_EMAIL))
            $invalid_email_signup = 'is-invalid';
        
            
        // executes if email and password is valid (not empty)
        else 
        {
            // Check if password and confirm password did not match
            if ($password_signup !== $confirm_password)
                $invalid_confirm_password = 'is-invalid';
    
            else 
            {
                // Call the register method to register new user
                if (signup_user($fname, $lname, $email_signup, $password_signup))
                    header("Location: signin&signup.php?signup=true");
                
                // Set invalid credentials to true if username already exists.
                else
                {
                    $invalid_email_signup = 'is-invalid';
                    $invalid_credentials_signup = true;
                }
            }
                
        }
    }

?>