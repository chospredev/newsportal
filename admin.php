<?php
  include('registration/functions.php');

    if(!isAdmin())
    {
      $_SESSION['msg'] = "You must log in first.";
      header("Location: registration/login.php");
    }

    if(isset($_GET['logout']))
    {
      session_destroy();
      unset($_SESSION['user']);
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

        <!--- CKEditor --->
          <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
        <!--- CKEditor --->
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
        <a class="text-dark" type="text" href="">You have 1 new message.</a>
        <a style="margin-right: 10px;" class="text-danger" href="#" id="previewMessage">Preview Message</a>
        <a href="admin.php" class="btn btn-dark"><i class="fa fa-user col-sm-1"></i>Welcome, <?php echo $_SESSION['user']['username']; ?></a>
        <a href="guest.php" class="btn btn-danger"><i class="fa fa-sign-out"></i> Log Out?</a>
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
          <li class="nav-item text-center">
            <a data-target="#addNewsArticle" class="text-white dropdown-toggle" data-toggle="modal" type="button" class="nav-link text-white">
              <i class="fa fa-edit"></i>
              Create an Article
            </a>
          </li>
        </ul>
    </nav>
    <div id="viewNewsID" style="width: 90%; margin-left: 10px;" class="jumbotron pull-right">
        <div class="jumbotron">
          <h1 style="font-family: 'Poppins', sans-serif; font-size: 72px;" class="text-danger text-right">Tech News</h1>
          <p style="font-family: 'Poppins', sans-serif; border-bottom: 1px solid black;" class="text-danger text-right">
            Access technology news worldwide, from all around the world.
          </p>
          <article class="news-review">
            <header>
              <table>
                <tr>
                  <td><p><?php viewNews(); ?>
                    <div class="modal fade" id="postComment" tabindex="-1" role="dialog" aria-labelledby="postCommentLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="postCommentLabel">Post a Comment</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                      <div class="modal-body">
                        <form method="post" action="admin.php">
                        <div class="form-group">
                          <label>Comment Text Area</label>
                          <textarea name="comment-text" class="form-control" placeholder="Comment Text"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Commenter Username</label>
                            <input type="text" name="commenter-username" class="form-control" placeholder="<?php echo $_SESSION['user']['username']; ?>" readonly="true">
                        </div>
                        <div class="form-group">
                          <label>Comment Date</label>
                          <input type="date" name="date-of-comment" class="form-control" readonly="true">
                        </div>
                      </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" name="saveChanges" class="btn btn-danger">Save changes</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                  </p></td>
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

  <!-- Modal - Add Page -->
  <div class="modal fade" id="addNewsArticle" tabindex="-1" role="dialog" aria-labelledby="addNewsArticleLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
      <h5 class="modal-title" id="addNewsArticleLabel">Add News Article</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
    <div class="modal-body">
      <form method="post" action="admin.php">
      <div class="form-group">
        <label>Headline</label>
        <input type="text" name="headline" class="form-control" placeholder="Headline">
      </div>
      <div class="form-group">
        <label>Story Text</label>
        <textarea name="storyText" class="form-control" placeholder="Story Text"></textarea>
      </div>
      <div class="form-group">
          <label>Story Author</label>
          <input type="text" name="authorUser" class="form-control" placeholder="Story Author">
      </div>
      <div class="form-group">
        <label>Article Date of Publish</label>
        <input type="date" name="date" class="form-control" placeholder="Add a date.">
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="saveChanges" class="btn btn-danger">Save changes</button>
      </div>
    </form>
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

          document.getElementById("previewMessage").onclick = function()
          {
            alert("You have been logged in as admin.");
          }

          CKEDITOR.replace('storyText');
        </script>
      <!--- JavaScript --->
  </body>
  <!--- Ending </body> tags. --->
</html>
