<?php

  if (isset($_POST["submit"])) {

    //Grabbing the data
      $uid = $_POST["uid"];
      $pswd = $_POST["pswd"];

    // Instantiate SignupContr class
      include "../classes/database.class.php";
      include '../classes/login.class.php';
      include '../classes/login-contr.class.php';

      $login = new LoginContr($uid, $pswd);

    // Running error handlers and user Signup
      $login->loginUser();

    // Going back to front page
      header("location: ../index.php?error=none");
  }
