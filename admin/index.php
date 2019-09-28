<?php

  require_once "dbconn.php";
  session_start();
  if (!isset($_SESSION['user_login'])) {
    header('location: index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/main.js"></script>
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../index.php"><i class='fa fa-graduation-cap' style='font-size:25px;color:red'></i> SMS</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="registration.php"><i class="fa fa-user-plus"></i> Add User</a></li>
            <li><a href="index.php?page=user_profile"><i class="fa fa-user"></i> Profile</a></li>
            <li><a href="logout.php"> <i class="fa fa-power-off"></i> Logout</a></li>
          </ul>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        <div class="list-group">
           <a href="index.php?page=dashboard" class="list-group-item active">
             <i class="fa fa-tachometer"></i> Dashboard
           </a>
           <a href="index.php?page=add_students" class="list-group-item">
              <i class="fa fa-user-plus"></i> Add Students
           </a>
           <a href="index.php?page=all_students" class="list-group-item">
             <i class='fa fa-graduation-cap'></i> All Students
           </a>
           <a href="index.php?page=all_users" class="list-group-item">
             <i class="fa fa-users"></i> All Users
           </a>
        </div>
      </div>
      <div class="col-sm-9">
        <div class="content">
          <?php
            if (isset($_GET['page'])) {
              $page = $_GET['page'].'.php';
            }
            else {
              $page = "dashboard.php";
            }

            if (file_exists($page))
            {
                require_once $page;
            }
            else
            {
                require_once 'error.php';
            }

          ?>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
    <p>Hello World!!!!</p>
  </footer>
</body>
</html>
