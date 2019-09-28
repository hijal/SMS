<?php
  require_once './dbconn.php';
  session_start();
  if (isset($_SESSION['user_login'])) {
    header('location: index.php');
  }
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` = '$username'");
    if (mysqli_num_rows($query) > 0) {
      $row = mysqli_fetch_assoc($query);
      if ($row['password'] == md5($password)) {
          if ($row['status'] == "active") {
            //echo "yes";
            $_SESSION['user_login'] = $username;
            header('location: index.php');
          }
          else {
            $status_err = "Please check Your gmail and active the account.";
          }
      }
      else {
        $password_match_err = "Invalid Password";
      }
      //print_r($row);
    }
    else {
      $username_login_err = "Invalid Username";
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <title>Student Management System</title>
  </head>
  <body>
    <div class="container animated bounceInDown">
      <h1 class="text-center my-4">Studen Management System</h1>
      <div class="row">
          <div class="col-sm-6 offset-sm-3">
            <h2 class="text-center">Admin Login</h2>
            <form action="login.php" method="post">
              <div>
                <input type="text" name="username" placeholder="Username" class="form-control" required="">
                <label class="error float-right">
                  <?php
                  if (isset($username_login_err)) {
                    echo $username_login_err;
                  }
                  ?>
                </label>
              </div>
              <div>
                <input type="password" name="password" placeholder="Password" required="" class="form-control">
                <label class="error float-right">
                  <?php
                  if (isset($password_match_err)) {
                    echo $password_match_err;
                  }
                  ?>
                </label>
              </div>
              <br>
              <div>
                <input type="submit" name="submit" value="Login" class="btn btn-info">
                <label class="error float-left">
                  <?php
                  if (isset($status_err)) {
                    echo $status_err;
                  }
                  ?>
                </label>
              </div>
            </form>
          </div>
      </div>
      <div class="text-center">
        <p>New Here? please <a class="btn btn-sm btn-info" href="registration.php" style="text-decoration: none;">Register</a> </p>
        <p>Go To <a class="btn btn-sm btn-primary" href="../index.php" style="text-decoration: none;">Home Page</a> </p>
      </div>
    </div>

  </body>
</html>
