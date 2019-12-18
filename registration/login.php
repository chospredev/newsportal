<?php
  include('functions.php');
?>
<!DOCTYPE html>
<html lang="en">

  <!--- Starting <head> tags. --->
  <head>

        <meta charset="UTF-8">
        <meta name="description" content="News Portal">
        <meta name="SPRECO" content="News Portal">

        <!--- Starting <title> tags. --->
        <title> Login | User </title>
        <!--- Ending </title> tags. --->

        <!--- Starting Cascading Style Sheet. [CSS] --->
          <link rel="stylesheet" type="text/css" href="../css/login.php.css">
        <!--- Ending Cascading Style Sheet. [CSS] --->

        <!--- Starting Boostrap 4.0 [BS 4.0] --->
          <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous">
          </script>
        <!--- Ending Boostrap 4.0 [BS 4.0] --->

  </head>
  <!--- Ending </head> tags. --->

  <!--- -  -  -  -  -  -  -  --->

  <!--- Starting <body> tags. --->
  <body>

    <div class="header bg-danger">
      <h2>Login | User</h2>
    </div>

    <form class="form-group" action="login.php" method="post">

        <?php echo display_error(); ?>

      <div class="input-group">
        <label>Username</label>
        <input type="text" name="username">
      </div>
      <div class="input-group">
        <label>Password</label>
        <input type="password" name="pwd">
      </div>
      <div class="input-group">
        <button style="width: 120px; font-family: 'Poppins', sans-serif;" type="submit" class="btn btn-danger text-white" name="login_user">Log in</button>
        <a style="margin-top: 15px; margin-left: 10px; font-family: 'Poppins', sans-serif;" class="text-danger" href="register.php">Not yet a member? Sign Up!</a>
      </div>
    </form>

  </body>
  <!--- Ending </body> tags. --->
</html>
