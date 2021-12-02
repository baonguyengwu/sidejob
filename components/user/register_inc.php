<?php
// Include config file
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/sidejob/";
require_once($path . 'connect.php');

// Define variables and initialize with empty values
$email = $password = $confirm_password = $phonenumber = $role = "";
$email_err = $password_err = $confirm_password_err = $phonenumber_err = $role_err ="";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = trim($_POST["name"]);
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT userID FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already registered.";
                } else{
                    $email = trim($_POST["email"]);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                      $email_err = "Invalid email format.";
                    }
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    if(empty(trim($_POST["phonenumber"]))){
        $phonenumber_err = "Please enter your phonenumber.";
      } elseif(strlen(trim($_POST["phonenumber"])) < 10){
          $phonenumber_err = "Phonenumber must have atleast 10 characters.";
      } else{
          // Prepare a select statement
          $sql = "SELECT userID FROM users WHERE phone = ?";

          if($stmt = mysqli_prepare($connection, $sql)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt, "s", $param_phonenumber);

              // Set parameters
              $param_phonenumber = trim($_POST["phonenumber"]);

              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt)){
                  /* store result */
                  mysqli_stmt_store_result($stmt);

                  if(mysqli_stmt_num_rows($stmt) == 1){
                      $phonenumber_err = "This phonenumber is already registered.";
                  } else{
                      $phonenumber = trim($_POST["phonenumber"]);
                  }
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }

              // Close statement
              mysqli_stmt_close($stmt);
          }
      }
      if(!isset($_POST["role"])) {
        $role_err = " Customer type field is required.";
      }
      else {
        $role = trim($_POST["role"]);
      }

    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($phonenumber_err) && empty($role_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (name, email, password, phone, role) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $sql);
        if($stmt){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_email, $param_password, $param_phonenumber, $param_role);

            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_phonenumber = $phonenumber;
            $param_role = $role;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.\n";
                print_r($stmt->error_list);
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($connection);
}
?>
