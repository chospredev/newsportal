<?php

  require 'config.inc.php';
  if(isset($_POST['login-submit']))
  {
    $username = $_POST['uid'];
    $password = $_POST['pwd'];

    if(empty($username) || empty($password))
    {
      header("Location: ../login.php?error=emptyFields");
      exit();
    }
    else
    {
      $sql = "SELECT * FROM users WHERE username=?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql))
      {
        header("Location: ../login.php?error=securityErrorSQL03");
        exit();
      }
      else
      {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result))
        {
          $passwordCheck = password_verify($password, $row['pwd']);
          if($passwordCheck == true)
          {
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: ../user.php?message=userSignInSuccess");
            exit();
          }
          else
          {
            header("Location: ../login.php?error=wrongPassword");
            exit();
          }
        }
        else
        {
          header("Location: ../login.php?error=noUser");
          exit();
        }
      }
    }
  }
  else
  {
    header("Location: ../register.php");
    exit();
  }
