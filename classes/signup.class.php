<?php

  class Signup extends Database {

      protected function setUser($uid, $pswd, $email) {
          $stmt = $this->connect()->prepare('INSERT INTO users (username, password, email) VALUES (?, ?, ?);');

          $hashedPwd = password_hash($pswd, PASSWORD_DEFAULT);

          if (!$stmt->execute(array($uid, $hashedPwd, $email))) {
              $stmt = null;
              header("location: ../index.php?error=stmtfailed");
              exit();
          }

          $stmt = null;
          
      }

      protected function checkuser($uid, $email) {
          $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

          if (!$stmt->execute(array($uid, $email))) {
              $stmt = null;
              header("location: ../index.php?error=stmtfailed");
              exit();
          }

          $resultCheck;
          if ($stmt->rowCount() > 0) {
              $resultCheck = false;
          }
          else {
              $resultCheck = true;
          }

          return $resultCheck;
      }
  }
