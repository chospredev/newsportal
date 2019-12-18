<?php
  include('registration/functions.php');
    if(!isLoggedIn())
    {
      $_SESSION['msg'] = "You must log in first.";
      header("Location: registration/login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

  <!--- Starting <head> tags. --->
  <head>

        <meta charset="UTF-8">
        <meta name="description" content="News Portal">
        <meta name="SPRECO" content="News Portal">

        <!--- Starting <title> tags. --->
        <title> News Portal </title>
        <!--- Ending </title> tags. --->

        <!--- Starting Cascading Style Sheet. [CSS] --->
          <link rel="stylesheet" type="text/css" href="css/guest.css">
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

        <!--- Starting FontAwesome CDN --->
        <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
          integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
          crossorigin="anonymous">
        </script>
        <!--- Ending FontAwesome CDN --->

        <!--- Starting JQuery CDN --->
        <script
          src="https://code.jquery.com/jquery-3.4.1.min.js"
          integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
          crossorigin="anonymous">
        </script>
        <!--- Ending JQuery CDN --->

                <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </head>
  <!--- Ending </head> tags. --->

  <!--- - - - - - - - - - -  --->
  <!--- Starting <body> tags. --->
  <body class="bg-white">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" type="button"
        aria-expanded="false" aria-label="Toggle Navigation" name="button">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="col-md-2">
      <button type="button" id="sidebarCollapse" name="button" class="btn btn-outline-dark">
        <i class="btn btn-info bg-danger"></i>
        <span>Toggle Sidebar</span>
      </button>
    </div>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a href="#" id="homeSize" class="nav-link text-danger">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Region</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">World</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Software</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Hardware</a>
          </li>
        </ul>
      </div>
      <div class="">
        <?php if(isset($_SESSION['user'])) : ?>
          <a class="text-dark" type="text" href="">You have 1 new message.</a>
          <a style="margin-right: 10px;" href="#" class="text-danger" id="previewMessage">Preview Message</a>
          <a href="user.php" class="btn btn-dark"><i class="fa fa-user col-sm-1"></i>Welcome, <strong><?php echo $_SESSION['user']['username']; ?></strong></a>
          <a href="user.php?logout='1'" class="btn btn-danger"><i class="fa fa-sign-out"></i> Log Out?</a>
        <?php endif ?>
      </div>
    </nav>

  <div class="wrapper">
    <nav id="sidebar" class="bg-danger text-center">
      <div class="sidebar-header">
        <h3>
        Tech News
        </h3>
        <p class="text-white">Access technology news worldwide, from all around the world.</p>
      </div>

        <ul class="list-unstyled components">
          <li class="nav-item">
            <li class="active">
            <a href="guest.php" class="nav-link text-white">
              <i class="fa fa-home"></i>
              Home
            </a>
          </li>
          </li>
          <li class="nav-item text-center">
            <a href="#regionSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link text-white">
              <i class="fa fa-globe"></i>
              Region
            </a>
            <ul class="collapse list-unstyled" id="regionSubmenu">
              <li class="nav-item">
                <a href="#" class="nav-link text-white">Bosnia & Herzegovina</a>
              </li>
              <li class="mav-item">
                <a href="#" class="nav-link text-white">Croatia</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link text-white">Serbia</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link text-white">Macedonia</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link text-white">Montenegro</a>
              </li>
            </ul>
          </li>
          <li class="nav-item text-center">
            <a href="#worldSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link text-white">
              <i class="fa fa-globe"></i>
              World
            </a>
            <ul class="collapse list-unstyled" id="worldSubmenu">
              <li class="nav-item">
                <a href="#" class="nav-link text-white">Europe</a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">South America</a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">North America</a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">Africa</a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">Asia</a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">Australia</a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">Antartica</a>
              </li>
            </ul>
          </li>
          <li class="nav-item text-center">
            <a href="#aboutMenu" class="nav-link text-white">
              <i class="fa fa-briefcase"></i>
              About
            </a>
          </li>
          <li class="nav-item text-center">
            <a href="#contactMenu" class="nav-link text-white">
              <i class="fa fa-address-card"></i>
              Contact
            </a>
          </li>
        </ul>
    </nav>
    <div style="width: 90%; margin-left: 10px;" class="jumbotron pull-right">
      <h3 class="text-center">News Module</h3>
      <div class="dropdown">
        <button id="createContent" class="bg-danger text-white dropdown-toggle border-0"
        style="border-radius: 20px; width: 300px; float: right; font-family: 'Poppins', sans-serif;"
        data-target="#addNewsArticle" data-toggle="modal" type="button">
          Create an Article
        </button>
      <div style="margin-top: 100px;" class="jumbotron">
        <article class="news-review">
          <header>
            <table>
              <tr>
                <td><p><?php viewNews(); ?></p></td>
              </tr>
              <tbody>
                <tr>
                </tr>
              </tbody>
            </table>
          </header>
        </article>
      </div>
      </div>
  </div>

      <!--- JavaScript --->
        <script type="text/javascript">
          $(document).ready(function () {
            $('#sidebarCollapse').on('click', function() {
              $('#sidebar').toggleClass('active');
            });
          });

          document.getElementById("createContent").onclick = function() {
            alert("You are not an admin!");
          };

          document.getElementById("previewMessage").onclick = function()
          {
            alert("You have been logged in as user.");
          }
        </script>
      <!--- JavaScript --->
  </body>
  <!--- Ending </body> tags. --->
</html>
