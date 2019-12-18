<?php
  # Defining variables. #
    require('config.inc.php');
      $errors = array();
      $success = array();
  # Defining variables. #

  # Algorithm for register button - submit-register. #
    if (isset($_POST['submit-register']))
    {
      # Defining variables for forms. #
        $username = e($_POST['uid']);
        $password = e($_POST['pwd']);
        $passwordRepeat = e($_POST['pwd-confirm']);
        $usertype = e($_POST['usertype']);
      # Defining variables for forms.
      # ----------------------------- #
      # Error algorithms. #
        if(empty($username))
        {
          array_push($errors, "Username is required.");
          header("Location: ../register.php?error01=usernameRequired=".$username);
          exit();
        }
        elseif(empty($password))
        {
          array_push($errors, "Password is required.");
          header("Location: ../register.php?error02=passwordRequired");
          exit();
        }
        elseif(empty($passwordRepeat))
        {
          array_push($errors, "Re-entering password is required.");
          header("Location: ../register.php?error03=passwordRepeatRequired");
          exit();
        }
        elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username))
        {
          array_push($errors, "Invalid characters in username field.");
          header("Location: ../register.php?error04=invalidCharactersUsernameField=".$username);
          exit();
        }
        elseif($password !== $passwordRepeat)
        {
          array_push($errors, "Passwords do not match.");
          header("Location: ../register.php?error05=passwordsDoNotMatch");
          exit();
        }
        elseif($usertype)
        {

        }
      # Error algorithms. #
      # ----------------- #
      # Prepared statements. #

      # Prepared statements. #
    }
  # Algorithm for register button - register-submit. #
?>
