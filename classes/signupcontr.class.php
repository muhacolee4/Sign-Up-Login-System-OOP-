<?php

  class SignupContr extends Signup {

      private $uid;
      private $pswd;
      private $pswdrepeat;
      private $email;

      public function __construct($uid, $pswd, $pswdrepeat, $email) {
          $this->uid = $uid;
          $this->pswd = $pswd;
          $this->pswdrepeat = $pswdrepeat;
          $this->email = $email;

      }

      public function signupUser() {

          if ($this->emptyInput() == false) {
              // echo "Empty Input!";
              header("location: ../index.php?error=emptyinput");
              exit();
          }
          if ($this->invalidUid() == false) {
              // echo "Invalid Username!";
              header("location: ../index.php?error=invalidUid");
              exit();
          }
          if ($this->invalidEmail() == false) {
              // echo "Invalid Email!";
              header("location: ../index.php?error=invalidEmail");
              exit();
          }
          if ($this->pswdMatch() == false) {
              // echo "Password Mismatch!";
              header("location: ../index.php?error=passwordMismatch");
              exit();
          }
          if ($this->userExist() == false) {
              // echo "User Already Exists!";
              header("location: ../index.php?error=userAlreadyExist");
              exit();
          }

          $this->setUser($this->uid, $this->pswd, $this->email);
      }

      private function emptyInput() {
          $result;
          // Checking for Empty Fields
          if (empty($this->uid) || empty($this->pswd) || empty($this->pswdrepeat) || empty($this->email)) {
              $result = false;
          }
          else {
              $result = true;
          }

          return $result;
      }

      private function invalidUid() {
          $result;

          if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
              $result = false;
          }
          else {
              $result = true;
          }

          return $result;
      }

      private function invalidEmail() {
          $result;

          if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
              $result = false;
          }
          else {
            $result = true;
          }

          return $result;
      }

      private function pswdMatch() {
          $result;

          if ($this->pswd !== $this->pswdrepeat) {
              $result = false;
          }
          else {
              $result = true;
          }

          return $result;
      }
      private function userExist() {
          $result;

          if (!$this->checkuser($this->uid, $this->email)) {
              $result = false;
          }
          else {
              $result = true;
          }

          return $result;
      }
  }
