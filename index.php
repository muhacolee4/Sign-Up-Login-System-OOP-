<?php

  session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up & Login System</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script type="text/javascript" src="bootstrap.min.js"></script>
  </head>
  <body>

    <header>
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
          <div class="container">
            <h3 class="navbar-brand">SIGN UP/LOGIN SYSTEM</h3>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navmenu"
            >
                <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="navmenu">
              <ul class="navbar-nav ms-auto">
                  <?php
                      if (isset($_SESSION["userid"])) {
                  ?>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <?php echo $_SESSION["username"]; ?>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="includes/logout.inc.php" class="nav-link">LOGOUT</a>
                  </li>

                  <?php
                      }
                      else {
                  ?>
                  <li class="nav-item">
                    <a href="#" class="nav-link">SIGN UP</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">LOGIN</a>
                  </li>
                  <?php
                      }
                   ?>
                </ul>
              </div>
            </div>
        </nav>
    </header>

    <section class="p-5">
        <div class="container">
          <div class="row text-center">
            <div class="col-md" style="border-left: solid 4px blue">
                <h4>SIGN UP</h4>
                <p>Don't have an account yet? Sign up here!</p>
                <form action="includes/signup.inc.php" method="post">
                    <input type="text" name="uid" placeholder="Username">
                    <input type="password" name="pswd" placeholder="Password">
                    <input type="password" name="pswdrepeat" placeholder="Repeat Password">
                    <input type="text" name="email" placeholder="E-mail">
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit">SIGN UP</button>
                </form>
            </div>
            <div class="col-md" style="border-left: solid 4px blue">
                <h4>LOGIN</h4>
                <p>Already have an account? Login here!</p>
                <form action="includes/login.inc.php" method="post">
                    <input type="text" name="uid" placeholder="Username or Email">
                    <input type="password" name="pswd" placeholder="Password">
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit">LOGIN</button>
                </form>
            </div>
          </div>
        </div>
    </section>

  </body>
</html>
