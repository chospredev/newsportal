<?php

  require 'config.inc.php';
    $errors = array();
    $success = array();
    $username = "";

    if(isset($_POST['login-submit']))
    {
      login();
    }

    function login()
    {
      global $conn;
      $username = e($_POST['uid']);
      $password = e($_POST['pwd']);
      $_SESSION = e($_POST['usertype']);

      if(empty($username))
      {
        array_push($errors, "Username is required.");
        header("Location: ../login.php?error=usernameRequired=".$username);
        exit();
      }
      elseif(empty($password))
      {
        array_push($errors, "Password is required.");
        header("Location: ../login.php?error=passwordRequired");
        exit();
      }
      else
      {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
          array_push($errors, "PrepareStatement_ERROR: Statement isn't prepared for execution.");
          header("Location: ../login.php?error=preparedStatementError");
          exit();
        }
        else
        {
          mysqli_stmt_bind_param($stmt, "ss", $username);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          if($row = mysqli_fetch_assoc($result))
          {
            $passwordCheck = password_verify($password, $row['pwd']);
            if($passwordCheck == true)
            {
              $_SESSION['id'] = $row['id'];
              $_SESSION['username'] = $row['username'];
              $_SESSION['usertype'] = 'user';
              array_push($success, "User signed in successfully.");
              header("Location: ../user.php?message=userSignInSuccess");
              exit();
            }
            elseif($passwordCheck == true)
            {
              $_SESSION['id'] = $row['id'];
              $_SESSION['username'] = $row['username'];
              $_SESSION['usertype'] = 'admin';
              array_push($success, "Admin signed in successfully.");
              header("Location: ../admin.php?message=adminSignInSuccess");
              exit();
            }
            else
            {
              array_push($errors, "You entered wrong password.");
              header("Location: ../login.php?error=wrongPassword");
              exit();
            }
          }
          else
          {
            array_push($errors, "User does not exist.");
            header("Location: ../login.php?error=noExistingUser");
            exit();
          }
      }
    }
}

  function e($val)
  {
    global $conn;
    return mysqli_real_escape_string($conn, trim($val));
  }
