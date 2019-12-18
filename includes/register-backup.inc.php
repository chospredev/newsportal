<?php

  require 'config.inc.php';
  if(isset($_POST['submit-register']))
  {
    $username = $_POST['uid'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-confirm'];

      # Let's check if any of 3 fields are empty, if yes, then we will send error through url. If not then we will go further. #
      if(empty($username) || empty($password) || empty($passwordRepeat))
      {
        header("Location: ../register.php?error=emptyFields");
        exit();
      }
      # Now let's check if user typed in any forbidden letter. #
      elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username))
      {
        header("Location: ../register.php?error=invalidLetters");
        exit();
      }
      # Let's check if $password and $passwordRepeat are different, if yes, error will pop in url, if not let's pass further. #
      elseif($password !== $passwordRepeat)
      {
        header("Location: ../register.php?error=passwordsDoNotMatch");
        exit();
      }
      else
      {
        # let's read from db and we will use here prepared statements, for better security. #
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
          header("Location: ../register.php?error=securityErrorSQL01");
          exit();
        }
        else
        {
          # Let's check if the username is taken already. #
          mysqli_stmt_bind_param($stmt, "s", $username);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);
          $resultCheck = mysqli_stmt_num_rows($stmt);
          if($resultCheck > 0)
          {
            header("Location: ../register.php?error=userTaken=".$username);
            exit();
          }
          else
          {
            # Let's use prepared statements once more. This time for creating / inserting an user #
            $sql = "INSERT INTO users (username, pwd) VALUES (?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql))
            {
              header("Location: ../login.php?error=securityErrorSQL02");
              exit();
            }
            else
            {
              # Let's do a "password_hash" it means that we will use a strong one-way algorithm. #
              $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
              mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPassword);
              mysqli_stmt_execute($stmt);
              header("Location: ../login.php?message=registrationSuccess");
              exit();
            }
          }
        }
      }
      # Let's close statements and connections. #
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
  }
  else
  {
    header("Location: ../register.php");
    exit();
  }

  <?php
    session_start();
    require('config.inc.php');
      $username = "";
      $errors = array();

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
          array_push($errors, "Username is required!");
        }
        elseif(empty($password))
        {
          array_push($errors, "Password is required!");
        }
        elseif($password !== $passwordRepeat)
        {
          array_push($errors, "Passwords do not match!");
        }

        if(count($errors) == 0)
        {
          $passwordHash = md5($password);

          if(isset($_POST['usertype']))
          {
            $usertype = e($_POST['usertype']);
            $query = "INSERT INTO users (username, pwd, usertype) VALUES ('$username', '$passwordHash', '$usertype')";
            mysqli_query($conn, $query);
            $_SESSION['success'] = "New user successfully added.";
            header("Location: ../login.php");
          }
          else
          {
            $query = "INSERT INTO users (username, pwd, usertype) VALUES ('$username', '$passwordHash', 'user')";
            mysqli_query($conn, $query);

            $loggedInUserID = mysqli_insert_id($conn);

            $SESSION['user'] = getUserById($loggedInUserID);
            $SESSION['success'] = "You are now logged in!";
            header("Location: ../user.php");
          }
        }
      }

      function getUserById($id)
      {
        global $conn;
        $query = "SELECT * FROM users WHERE id=" . $id;
        $result = mysqli_query($conn, $query);

        $user = mysqli_fetch_assoc($result);
        return $user;
      }

      function e($val)
      {
        global $conn;
        return mysqli_real_escape_string($conn, trim($val));
      }

      function display_error()
      {
        global $errors;

        if(count($errors) > 0)
        {
          echo '<div class="error">';
                  foreach($errors as $error)
                  {
                    echo $error . '<br>';
                  }
          echo '</div>';
        }
      }
