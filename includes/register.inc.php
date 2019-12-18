<?php
  require 'config.inc.php';
    $username = "";
    $errors = array();
    $success = array();

    if(isset($_POST['submit-register']))
    {
      register();
    }

      function register()
      {
        global $conn;
        $username = e($_POST['uid']);
        $password = e($_POST['pwd']);
        $passwordRepeat = e($_POST['pwd-confirm']);

        if(empty($username))
        {
          array_push($errors, "Username is required.");
          header("Location: ../register.php?error=usernameRequired=".$username);
          exit();
        }
        elseif(empty($password))
        {
          array_push($errors, "Password is required.");
          header("Location: ../register.php?error=passwordRequired");
          exit();
        }
        elseif(empty($passwordRepeat))
        {
          array_push($errors, "Re-entering password is required.");
          header("Location: ../register.php?error=pwdConfirmationRequired");
          exit();
        }
        elseif($password !== $passwordRepeat)
        {
          array_push($errors, "Passwords do not match.");
          header("Location: ../register.php?error=passwordsDoNotMatch");
          exit();
        }
        elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username))
        {
          array_push($errors, "Invalid string / letter pattern.");
          header("Location: ../register.php?error=invalidUid=".$username);
          exit();
        }
        else
        {
          $sql = "SELECT username FROM users WHERE username = ?";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql))
          {
            array_push($errors, "PrepareStatement_ERROR: Statement isn't prepared for execution.");
            header("Location: ../register.php?error=preparedStatementError");
            exit();
          }
          else
          {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0)
            {
              array_push($errors, "The user you are trying to create is already taken.");
              header("Location: ../register.php?error=userTaken");
              exit();
            }
            else
            {
              $sql = "INSERT INTO users (username, pwd)
                                  VALUES(?, ?)";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql))
              {
                array_push($errors, "PrepareStatement_ERROR: Statement isn't prepared for execution.");
                header("Location: ../register.php?error=preparedStatementError");
                exit();
              }
              else
              {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPassword);
                mysqli_stmt_execute($stmt);
                array_push($success, "Registration has been completed successfully. Redirecting...");
                header("Location: ../login.php?success=registration");
                exit();
              }
            }
          }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
      }

      function e($val)
      {
        global $conn;
        return mysqli_real_escape_string($conn, trim($val));
      }
