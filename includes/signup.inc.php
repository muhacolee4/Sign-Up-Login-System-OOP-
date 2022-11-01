<?php

  if (isset($_POST["submit"])) {

    //Grabbing the data
      $uid = $_POST["uid"];
      $pswd = $_POST["pswd"];
      $pswdrepeat = $_POST["pswdrepeat"];
      $email = $_POST["email"];

    // Instantiate SignupContr class
      include "../classes/database.class.php";
      include '../classes/signup.class.php';
      include '../classes/signupcontr.class.php';

      $signup = new SignupContr($uid, $pswd, $pswdrepeat, $email);

    // Running error handlers and user Signup
      $signup->signupUser();

    // Going back to front page
      header("location: ../index.php?error=none");
  }
