<?php

  class Login extends Database {

      protected function getUser($uid, $pswd) {
          $stmt = $this->connect()->prepare('SELECT password FROM users WHERE username = ? OR email = ?;');

          if (!$stmt->execute(array($uid, $uid))) {
              $stmt = null;
              header("location: ../index.php?error=stmtfailed");
              exit();
          }

          if ($stmt->rowCount() == 0) {
              $stmt = null;
              header("location: ../index.php?error=usernotfound");
              exit();
          }

          $pswdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $hashedPwd = password_hash($pswd, PASSWORD_DEFAULT);
          $checkedPswd = password_verify($pswd, $pswdHashed[0]["password"]);

          if ($checkedPswd == false) {
              $stmt = null;
              header("location: ../index.php?error=wrongpassword");
              exit();
          }
          elseif ($checkedPswd == true) {
              $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username = ? OR email = ? AND password = ?;');

              if (!$stmt->execute(array($uid, $uid, $pswd))) {
                  $stmt = null;
                  header("location: ../index.php?error=stmtfailed");
                  exit();
              }
/*
              if ($stmt->rowCount() == 0) {
                  $stmt = null;
                  header("location: ../index.php?error=userNOTfound");
                  exit();
              }
*/
              $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

              session_start();
              $_SESSION['userid'] = $user[0]["uid"];
              $_SESSION['username'] = $user[0]["username"];
              $stmt = null;

          }
      }

  }
