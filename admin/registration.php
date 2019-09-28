<?php
  //include "dbconn.php";
  require_once './dbconn.php';
  session_start();
  if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    // $photo = $_FILES["photo"]["name"];
    // echo $photo;
    $photo = explode(".", $_FILES["photo"]["name"]);
    $photo_name = $username.".".end($photo);
    //echo $photo_name;
    $inp_error = array();

    if (empty($name)) {
      $inp_error["name"]= "The Name field is required.";
    }
    if (empty($email)) {
      $inp_error["email"]= "The E-mail field is required.";
    }
    if (empty($username)) {
      $inp_error["username"]= "The Username field is required.";
    }
    if (empty($password)) {
      $inp_error["password"]= "The Password field is required.";
    }
    if (empty($confirm_password)) {
      $inp_error["confirm_password"]= "The Confirm Password field is required.";
    }
    //echo count($inp_error);
    if (count($inp_error) == 0) {
      $email_check = mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '$email';");
      $is_exits = mysqli_num_rows($email_check);
      //echo $is_exits;
      if( $is_exits == 0){
        $username_check = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` = '$username';");
        $is_exits = mysqli_num_rows($username_check);
        if ($is_exits == 0) {
          if(strlen($username) >= 5)
          {
            if (strlen($password) >= 8) {
              if ($password == $confirm_password) {
                $query = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES (
                  '$name', '$email', '$username', MD5('".$password."'), '$photo_name', 'inactive'
                )";
                $result = mysqli_query($conn, $query);
                if ($result) {

                  $_SESSION["successfully registered"] = "successfully registered.";
                  move_uploaded_file($_FILES["photo"]["tmp_name"], 'images/'.$photo_name);
                  header('location: login.php');
                }
                else {
                  $_SESSION["Sorry"] = "You are not registered yet.";
                }
              }
              else {
                $password_match_err = "Password must be matched.";
              }
            }
            else {
              $password_len_err = "Password Must Be more than or equal 8 characters or Digits.";
            }
          }
          else {
            $username_len_err = "Username More than or equal 5 characters.";
          }
        }
        else {
          $username_err = "The Username Already Taken.";
        }
      }
      else {
        $email_err = "The E-mail Already Taken.";
      }
    }
  }

?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <title>User Registration Form</title>
  </head>
  <body>
    <div class="container">
      <br>
      	<h1 class="text-center">User Registration Form</h1>

      	<form class="form-horizontal my-3" role="form" method="post" action="registration.php" enctype="multipart/form-data">
      	   <div class="form-group">
      	      <label for="name" class ="control-label col-sm-3">Name</label>
          		<div class="col-sm-8">
          	      <input type="name" name="name" class="form-control" id="name" placeholder="Enter Your Full Name">
                  <label class="error float-right">
                    <?php
                    if (isset($inp_error["name"])) {
                      echo $inp_error["name"];
                    }
                    ?>
                  </label>
          		</div>

      	   </div>

           <div class="form-group">
      	      <label for="email" class ="control-label col-sm-3">E-mail</label>
          		<div class="col-sm-8">
          	      <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email">
                  <label class="error float-right">
                    <?php
                    if (isset($inp_error["email"])) {
                      echo $inp_error["email"];
                    }
                    ?>
                  </label>
                  <label class="error float-right">
                    <?php
                    if (isset($email_err)) {
                      echo $email_err;
                    }
                    ?>
                  </label>
          		</div>
      	   </div>

           <div class="form-group">
      	      <label for="username" class ="control-label col-sm-3">Username</label>
          		<div class="col-sm-8">
          	      <input type="name" name="username" class="form-control" id="username" placeholder="Enter Your username">
                  <label class="error float-right">
                    <?php
                    if (isset($inp_error["username"])) {
                      echo $inp_error["username"];
                    }
                    ?>
                  </label>
                  <label class="error float-right">
                    <?php
                    if (isset($username_err)) {
                      echo $username_err;
                    }
                    ?>
                  </label>
                  <label class="error float-right">
                    <?php
                    if (isset($username_len_err)) {
                      echo $username_len_err;
                    }
                    ?>
                  </label>
          		</div>
      	   </div>

           <div class="form-group">
      	      <label for="password" class ="control-label col-sm-3">Password</label>
          		<div class="col-sm-8">
          	      <input type="password" name="password" class="form-control" id="password" placeholder="Enter Your Password">
                  <label class="error float-right">
                    <?php
                    if (isset($inp_error["password"])) {
                      echo $inp_error["password"];
                    }
                    ?>
                  </label>
                  <label class="error float-right">
                    <?php
                    if (isset($password_len_err)) {
                      echo $password_len_err;
                    }
                    ?>
                  </label>
          		</div>
      	   </div>

           <div class="form-group">
      	      <label for="confirm_password" class ="control-label col-sm-3">Confirm Password</label>
          		<div class="col-sm-8">
          	      <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                  <label class="error float-right">
                    <?php
                    if (isset($inp_error["confirm_password"])) {
                      echo $inp_error["confirm_password"];
                    }
                    ?>
                  </label>
                  <label class="error float-right">
                    <?php
                    if (isset($password_match_err)) {
                      echo $password_match_err;
                    }
                    ?>
                  </label>
              </div>
      	   </div>

           <div class="form-group">
      	      <label for="photo" class="control-label col-sm-3">Select Photo</label>
          		<div class="col-sm-8">
          	      <input type="file" name="photo" id="photo">
          		</div>
      	   </div>
      	   <div class="col-sm-8 float-left">
      	     <input type="submit" name="submit" value="Sign Up" class="btn btn-primary">
      	   </div>
      	</form>
        <br> <br>
        <p>
          Already have an account? <a class="btn btn-sm btn-primary" href="login.php" style="text-decoration: none;">Login Now</a>
        </p>
        <p>Go To <a class="btn btn-sm btn-primary" href="../index.php" style="text-decoration: none;">Home Page</a> </p>
        <footer>
          
        </footer>
      </div>

  </body>
</html>
