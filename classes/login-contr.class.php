<?php

  class LoginContr extends Login {

      private $uid;
      private $pswd;

      public function __construct($uid, $pswd) {
          $this->uid = $uid;
          $this->pswd = $pswd;

      }

      public function loginUser() {

          if ($this->emptyInput() == false) {
              // echo "Empty Input!";
              header("location: ../index.php?error=emptyinput");
              exit();
          }


          $this->getUser($this->uid, $this->pswd);
      }

      private function emptyInput() {
          $result;
          // Checking for Empty Fields
          if (empty($this->uid) || empty($this->pswd)) {
              $result = false;
          }
          else {
              $result = true;
          }

          return $result;
      }


  }
