


	<?php

    // Optional: For Successful registration notification only (CSS)
/*    $registered = false;
    if (isset($_GET['registered']))
        $registered = $_GET['registered'];*/

    // For CSS use only
    $invalid_firstname_update            = "";
    $invalid_lastname_update            = "";


    // For validation of credentials
    $invalid_credentials_update= false;

    // Credentials value: By default set to empty string
    $firstname_update                  = "";
    $lastname_update                  = "";


    /*
     *  Checks if the request is POST request 
     *  triggered when you login button
     */

   
    if(isset($_POST['profile_btn_update']))
    {
        $conn = new mysqli("localhost", "root", "", "badboyskusinadb");
        // Set cedentials
        $firstname_update            = $conn -> real_escape_string($_POST['firstname_update']);
        $lastname_update             = $conn -> real_escape_string($_POST['lastname_update']);

        // default value every post request/login button click event
        $invalid_credentials_signup = false;

        // Check if  all fields are empty
        if (empty($firstname_update) || empty($lastname_update))
        {
            // apply CSS style if firstname is empty
            if (empty($firstname_update))
                $invalid_firstname_update = 'is-invalid';

            // apply CSS style if lastname is empty
            if (empty($lastname_update)) 
                $invalid_lastname_update = 'is-invalid';
            


        }


            
                // Call the register method to register new user
                $uid = $_SESSION['uid'];


                $sql = new mysqli("localhost", "root", "", "badboyskusinadb");
			    $query = "UPDATE users SET fname = '$firstname_update', lname = '$lastname_update' WHERE uid='$uid'"; 


                $query_run = mysqli_query($conn,$query);

                	if($query_run) {
						header("Location: ./profile.php?update=true");
					}
					else {
						header("Location: ./profile.php?update=false");
						
					}
                
                	$invalid_credentials_update = true;
            
                
        }
    

?>



