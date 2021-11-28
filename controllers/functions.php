<?php 
session_start();
        /**
     * Get DB connection
     *
     * @param void
     *
     * @return db connection
     */
    function getDatabaseConnection() {
        try { // connect to database and return connections
            $conn = new PDO( 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS );
            return $conn;
        } catch ( PDOException $e ) { // connection to database failed, report error message
            return $e->getMessage();
        }
    }

    /**
     * Get row from a table with a value
     *
     * @param string $tableName
     * @param string $column
     * @param string $value
     *
     * @return array $info
     */
    function getRowWithValue( $tableName, $column, $value ) {
        // get database connection
        $databaseConnection = getDatabaseConnection();

        // create our sql statment
        $statement = $databaseConnection->prepare( '
            SELECT
                *
            FROM
                ' . $tableName . '
            WHERE
                ' . $column . ' = :' . $column
        );

        // execute sql with actual values
        $statement->setFetchMode( PDO::FETCH_ASSOC );
        $statement->execute( array(
            $column => trim( $value )
        ) );

        // get and return user
        $user = $statement->fetch();
        return $user;
    }

        /**
     * Get user with email address
     *
     * @param array $email
     *
     * @return array $userInfo
     */
    function getUserWithEmailAddress( $email ) {
        // get database connection
        $databaseConnection = getDatabaseConnection();

        // create our sql statment
        $statement = $databaseConnection->prepare( '
            SELECT
                *
            FROM
                users
            WHERE
                email = :email
        ' );

        // execute sql with actual values
        $statement->setFetchMode( PDO::FETCH_ASSOC );
        $statement->execute( array(
            'email' => trim( $email )
        ) );

        // get and return user
        $user = $statement->fetch();
        return $user;
    }

    /**
     * Update a colum with a value in a table by id
     *
     * @param string $tableName
     * @param string $column
     * @param string $value
     * @param string $id
     *
     * @return void
     */
    function updateRow( $tableName, $column, $value, $id ) {
        // get database connection
        $databaseConnection = getDatabaseConnection();

        // create our sql statment
        $statement = $databaseConnection->prepare( '
            UPDATE
                ' . $tableName . '
            SET
                ' . $column . ' = :value
            WHERE
                uid = :id
        ' );

        // set our parameters to use with the statment
        $params = array(
            'value' => trim( $value ),
            'id' => trim( $id )
        );

        // run the query
        $statement->execute( $params );
    }

        /**
     * Sign a user up
     *
     * @param array $info
     *
     * @return array $userInfo
     */
    function signUserUp( $info ) {
        // get database connection
        $databaseConnection = getDatabaseConnection();

        // create our sql statment
        $statement = $databaseConnection->prepare( '
            INSERT INTO
                users (
                    fname,
                    lname,
                    email,
                    password,
                    fb_user_id,
                    fb_access_token,
                )
            VALUES (
                :fname,
                :lname,
                :email,
                :password,
                :fb_user_id,
                :fb_access_token,
            )
        ' );

        // execute sql with actual values
        $statement->execute( array(
            'fname' => trim( $info['first_name'] ),
            'lname' => trim( $info['last_name'] ),
            'email' => trim( $info['email'] ),
            'password' => isset( $info['password'] ) ? hashedPassword( $info['password'] ) : '',
            'fb_user_id' => isset( $info['id'] ) ? $info['id'] : '',
            'fb_access_token' => isset( $info['fb_access_token'] ) ? $info['fb_access_token'] : '',
            
        ) );

        // return id of inserted row
        return $databaseConnection->lastInsertId();
    }




function signup_user($fname, $lname, $email_signin, $password_signin)
{
    // open database connection
    $conn = connect_to_database();

    // Check if username already exists.
    $sql = "SELECT * FROM users WHERE email='$email_signin'";
    $result = $conn->query($sql);

    // return false if email already exists
    if ($result->num_rows > 0) 
        return false;
    
    // Insert username to the database
    $password_hash = password_hash($password_signin, PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (fname, lname, email, password)
    VALUES ('$fname', '$lname', '$email_signin', '$password_hash')";
    
    // return true if user has successfully inserted to the database
    if ($conn->query($sql) === TRUE) {
      return true;
    }
    
    else {
        header("Location: signin&signup.php?signup=false");
        return false;
    }
    
}

function signin_user($email_signup, $password_signup)
{   
        // open database connection
    $conn = connect_to_database();

    $sql = "SELECT * From users WHERE email = '{$email_signup}' ";
    $stmt = mysqli_stmt_init($conn);
    $query = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($query);

    if(!$query){
           die("SQL query failed: " . mysqli_error($conn));
    }
    if($rowCount <= 0) {
                $accountNotExistErr = '<div class="alert alert-danger">
                        User account does not exist.
                    </div>';
   } 
    else {
        if ($row = mysqli_fetch_array($query)) {
                    // Then we match the password from the database with the password the user submitted. The result is returned as a boolean.
                    $pwdCheck = password_verify($password_signup, $row['password']);
                    // If they don't match then we create an error message!
                    if ($pwdCheck == false) {
                      // If there is an error we send the user back to the signup page.
                      $wrongPwdErr = '<div class="alert alert-danger">
                        Wrong password.
                    </div>';
                    }
                    // Then if they DO match, then we know it is the correct user that is trying to log in!
                    else if ($pwdCheck == true) {

                      session_start();
                      $_SESSION['uid']       = $row['uid'];
                      $_SESSION['fname']     = $row['fname'];
                      $_SESSION['lname']     = $row['lname'];
                      $_SESSION['email']     = $row['email'];
                      $_SESSION['user_type'] = $row['user_type'];
                      return true;
                      // Now the user is registered as logged in and we can now take them back to the front page! :)
                      header("Location: ./view/menu.php?");
                      exit();
                    }
                  }
                }


    close_connection($conn);
    // return false if incorrect username or password
    return false;
}

function update_profile($email, $fname, $lname)
{ 

     try {

     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "badboyskusinadb";

     $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    } catch (PDOException $e) {
      echo $e->getMessage();
    }

    $uid = $_SESSION['uid'];

      $data  = [
        'email' => $email,
        'fname' => $fname,
        'lname' => $lname,
        'uid'   => $uid,
      ];

      $result = $conn->prepare("UPDATE users SET email=:email, fname=:fname, lname=:lname WHERE uid=:uid");
      $result->execute($data);

      if($result) {
        header("Location: ./profile.php?update=truedb");
        return true;
      }
      else {
        header("Location: ./students.php?update=false");
      }

  $conn->close();
  return false;
}

function update_password($currentPass, $newPass)
{ 

     try {

     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "badboyskusinadb";

     $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    } catch (PDOException $e) {
      echo $e->getMessage();
    }

     $uid = $_SESSION['uid'];


      $result = $conn->prepare("SELECT * FROM users WHERE uid = ?");
      $result->bindParam(1, $uid, PDO::PARAM_INT);
      $result->execute();

      $row = $result->fetch(PDO::FETCH_ASSOC);
      if(!$row) {
        header("Location: ./profile.php?row=error");
        return false;
      }

      $pwdCheck = password_verify($currentPass, $row['password']);
      if($pwdCheck === false) {
        header("Location: ./profile.php?pwdCheck=false");
        return false;
      }

      else {
        $password_hash = password_hash($newPass, PASSWORD_BCRYPT);
        $result = $conn->prepare("UPDATE users SET password = ? WHERE uid = ?");
        $result->bindParam(1, $password_hash, PDO::PARAM_STR);
        $result->bindParam(2, $uid, PDO::PARAM_INT);
        $result->execute();

        if($result) {
        header("Location: ./profile.php?update_pwd=true");
        return true;
        } else {
          header("Location: ./students.php?update_pwd=false");
          return false;
        }

      }
      

  $conn->close();
  return false;
}

// Open database connection
function connect_to_database()
{
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "badboyskusinadb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Close database connection
function close_connection($conn)
{
    $conn->close();
}


?>