<?php

  # Starting session. #
    session_start();
  # Starting session. #

  # Connection to database. #
    $db = mysqli_connect('localhost', 'root', '', 'assignmentnews');
  # Connection to database. #

  # Let's declare some variables. #
    $username = "";
    $errors = array();
  # Let's declare some variables. #

  # Call the register() function if register_btn is clicked. #
    if(isset($_POST['register_btn']))
    {
      register();
    }
  # Call the register() function if register_btn is clicked. #

  # Register function. #
    function register()
    {
      # Let's use here 'global' keyword to make these declared variables available outside function. #
        global $db, $errors, $username;
      # Let's use here 'global' keyword to make these declared variables available outside function. #

      # Recieve all input values from the form. Let's call e() / escape string function. #
        $username = e($_POST['username']);
        $password_01 = e($_POST['pwd']);
        $password_02 = e($_POST['pwd-confirmation']);
      # Recieve all input values from the form. Let's call e() / escape string function. #

      # Form validation. Let's make sure that form is correctly filled. #
        if(empty($username)) { array_push($errors, "Username is required."); }
        if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) { array_push($errors, "Invalid characters in username field."); }
        if(empty($password_01)) { array_push($errors, "Password field can't be empty."); }
        if(empty($password_02)) { array_push($errors, "Re-entering password field can't be empty, either."); }
      # Form validation. Let's make sure that form is correctly filled. #

      # Let's register user if there are no errors inside form. #
        if(count($errors) == 0)
        {
          # Encrypt password before storing it inside database. #
            $password = md5($password_01);
          # Encrypt password before storing it inside database. #

          if(isset($_POST['usertype']))
          {
            $usertype = e($_POST['usertype']);
            $query = "INSERT INTO users (username, pwd, usertype) VALUES ('$username', '$password', '$usertype')";
            mysqli_query($db, $query);
            $_SESSION['success'] = "New user successfully created.";
            header("Location: ../registration/login.php");
          }
          else
          {
            $query = "INSERT INTO users (username, pwd, usertype) VALUES ('$username', '$password', 'user')";
            mysqli_query($db, $query);

            # Let's get ID of the created user. #
              $logged_in_user_ID = mysqli_insert_id($db);
            # Let's get ID of the created user. #

              # Let's put logged in user in session. #
                $_SESSION['user'] = getUserById($logged_in_user_ID);
                $_SESSION['success'] = "You are now logged in.";
                header("Location: ../user.php?loggedIn");
              # Let's put logged in user in session. #
          }
        }
      # Let's register user if there are no errors inside form. #
    }

    # Function for getting users ID. #
      function getUserById($id)
      {
        global $db;
        $query = "SELECT * FROM users WHERE id=" . $id;
        $result = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($result);
        return $user;
      }
    # Function for getting users ID. #

    # Escape string function. #
      function e($val)
      {
        global $db;
        return mysqli_real_escape_string($db, trim($val));
      }
    # Escape string function. #
  # Register function. #

  # Display error function. #
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
  # Display error function. #

  # Let's make an algorithm when person types url like: user.php into browser they are unable to access page if not logged in. #
    function isLoggedIn()
    {
      if(isset($_SESSION['user']))
      {
        return true;
      }
      else
      {
        return false;
      }
    }
  # Let's make an algorithm when person types url like: user.php into browser they are unable to access page if not logged in. #

  # Let's make an function if user click logout button, logout action happens. #
    if(isset($_GET['logout']))
    {
      session_destroy();
      unset($_SESSION['user']);
      header("Location: login.php");
    }
  # Let's make an function if user click logout button, logout action happens. #

  # Let's call the login() function if the login button is clicked. #
    if(isset($_POST['login_user']))
    {
      login();
    }

    function login()
    {
      # Let's use here 'global' keyword to make these declared variables available outside function. #
        global $db, $username, $errors;
      # Let's use here 'global' keyword to make these declared variables available outside function. #

      # Recieve all input values from the form. Let's call e() / escape string function. #
        $username = e($_POST['username']);
        $password = e($_POST['pwd']);
      # Recieve all input values from the form. Let's call e() / escape string function. #

      # Form validation. Let's make sure that form is correctly filled. #
        if(empty($username)) { array_push($errors, "Username field is required. It can't be empty."); }
        if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) { array_push($errors, "Invalid characters in username field."); }
        if(empty($password)) { array_push($errors, "Password field is required. It can't be empty."); }
      # Form validation. Let's make sure that form is correctly filled. #

      # Let's attempt login if there are no errors on form. #
        if(count($errors) == 0)
        {
          $password = md5($password);
          $query = "SELECT * FROM users WHERE username='$username' AND pwd='$password'";
          $results = mysqli_query($db, $query);

          # User found. #
            if(mysqli_num_rows($results) == 1)
          # User found. #
          {
            # Let's check if person is admin or user. #
              $logged_in_user = mysqli_fetch_assoc($results);
              if($logged_in_user['usertype'] == 'admin')
              {
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success'] = "You are logged in as admin.";
                header("Location: ../admin.php");
              }
              else
              {
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success'] = "You are now logged in as user.";
                header("Location: ../user.php");
              }
            # Let's check if person is admin or user. #
          }
          else
          {
            array_push($errors, "Wrong username/password combination.");
          }
        }
      # Let's attempt login if there are no errors on form. #
    }
  # Let's call the login() function if the login button is clicked. #

  # Let's add isAdmin function. #
    function isAdmin()
    {
      if(isset($_SESSION['user']) && $_SESSION['user']['usertype'] == 'admin')
      {
        return true;
      }
      else
      {
        return false;
      }
    }
  # Let's add isAdmin function. #

  # Algorithm for saveChanges button-submit. #
    if(isset($_POST['saveChanges']))
    {
      saveChangesArticle();
    }
  # Algorithm for saveChanges button-submit. #

  # Save changes function. #
    function saveChangesArticle()
    {
      global $db, $errors;
      $headline = e($_POST['headline']);
      $storyline = e($_POST['storyText']);
      $authorUsername = e($_POST['authorUser']);
      $timestampDate = e($_POST['date']);

      if(empty($headline)) { array_push($errors, "Headline / Title field is required."); }
      if(empty($storyline)) { array_push($errors, "Storyline / Text field is required."); }
      if(empty($authorUsername)) { array_push($errors, "Author / Username field is required."); }
      if(empty($timestampDate)) { array_push($errors, "Date field is required."); }

      if(count($errors) == 0)
      {
        $query = "INSERT INTO newsmodule (headline, storyline, username, timestamp)
                                  VALUES ('$headline', '$storyline', '$authorUsername', '$timestampDate')";
        mysqli_query($db, $query);
        header("Location: admin.php?ArticleAddedSuccessfully");
        exit();
      }
      else
      {
        echo("Error: Creating article failed.");
      }
    }
  # Save changes function. #

  # Function for viewing news. #
    function viewNews()
    {
      global $db;
      $query = "SELECT * FROM newsmodule ORDER BY timestamp";
      $result = @mysqli_query($db, $query);
      if (!$result)
      {
        echo "Error selecting headline from database.";
        exit();
      }
      if (mysqli_num_rows($result) > 0)
      {
        echo "<div style='margin-left: -90px; width: 110%;' class='jumbotron'>";
        while ($row = mysqli_fetch_object($result))
        {
          echo "<h1><br>" . $row->headline . "</h1>";
          echo "<hr>";
          echo "<p>" . $row->storyline . "</p>";
          echo "<hr>";
          echo "<h5 class='pull-right'>" . $row->username . "</h5>";
          echo "<p>" . $row->timestamp . "</p>";
          echo "<hr>";
          echo "<a data-target='#postComment' class='text-white dropdown-toggle btn btn-danger' data-toggle='modal' type='button'>";
          echo  "Publish a Comment";
          echo "</a>";
        }
        echo "</div>";
      }
      else
      {
        echo "No headlines in database.";
      }
    }
  # Function for inserting comments. #
    function addComment()
    {
      global $db, $errors, $username;
      $comment = e($_POST['comment-text']);
      $username = e($_POST)['commenter-name'];
      $commentDate = e($_POST['date-of-comment']);

      if(count($errors) == 0)
      {
        $query = "INSERT INTO comments (name, comment, date) VALUES ('$username', '$comment', NOW())";
        mysqli_query($db, $sql);
      }
    }
  # Function for inserting comments. #

  # Function for joining tables. #
    global $db, $errors, $username;
    $sql = "SELECT articlecID FROM comments LEFT JOIN newsmodule ON comments.articlecID = newsmodule.id";
    mysqli_query($db, $sql);

    if(count($errors) == 0)
    {
      $comment = e($_POST['comment-text']);
      $username = e($_POST['commenter-name']);
      $commentDate = e($_POST['date-of-comment']);
      if(empty($comment)) { array_push($errors, "If you want to post comment, 'Comment Text' is required field."); }
      if(count($errors) == 0)
      {
        $query = "INSERT INTO comments (name, comment, date) VALUES ('$username', '$comment', NOW())";
        mysqli_query($db, $query);
      }
    }
  # Function for joining tables. #

  # Post comment function. #
    function postComment()
    {
    }
  # Post comment function. #
