
<?php

    $conn = mysqli_connect("localhost", "root", "", "badboyskusinadb");
    // For CSS use only
    $invalid_email_signin       = "";
    $invalid_password_signin     = "";


    // For validation of credentials
    $invalid_credentials_signin = false;

    // Credentials value: By default set to empty string
    $email_signin   = "";
    $password_signin = "";

    /*
     *  Checks if the request is POST request 
     *  triggered when you login button
     */
    if (isset($_POST['signin_btn']))
    {
        // Set email and password
        $email_signin           = $conn -> real_escape_string($_POST['email_signin']);
        $password_signin        = $_POST['password_signin'];



        // default value every post request/login button click event
        $invalid_credentials_signin = false;
        
        $clean_email  = filter_var($email_signin, FILTER_SANITIZE_EMAIL);
        if ($email_signin != $clean_email && !filter_var($email_signin,FILTER_VALIDATE_EMAIL)){
            $invalid_email_signin = 'is-invalid';
        }
        // Check if either email or password_signin are empty
        if (empty($email_signin) || empty($password_signin))
        {
            // apply CSS style if email is empty
            if (empty($email_signin))
                $invalid_email_signin = 'is-invalid';

            // apply CSS style if password_signin is empty
            if (empty($password_signin))
                $invalid_password_signin = 'is-invalid';
        }
        

        // executes if email and password_signin is valid (not empty)
        else 
        {
            // Call the login method and redirect the user to home page if credentials are correct
            if (signin_user($email_signin, $password_signin))
                header("Location: view/menu.php?");
                
            // Set invalid credentials to true if email and password is incorrect.
            else
            {
                $invalid_email = 'is-invalid';
                $invalid_password = 'is-invalid';

                $invalid_credentials_signin = true;
            }
                
        }
    }

?>