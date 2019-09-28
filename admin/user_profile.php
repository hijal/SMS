<h1 class="text-primary"><i class="fa fa-user"></i> User Profile <small>My Profile</small> </h1>
<ol class="breadcrumb">
  <li><a href="index.php?page=dashboard"><i class="fa fa-tachometer"></i> Dashboard</a></li>
  <li> <i class="fa fa-user"></i> My Profile</li>
</ol>
<?php
  $session_user = $_SESSION['user_login'];
  $user_info = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` = '$session_user'");
  $current_user = mysqli_fetch_assoc($user_info);
  //print_r($current_user);
?>
<div class="row">
  <div class="col-sm-6">
    <table class="table table-bordered">
      <tr>
        <td>User ID</td>
        <td><?=$current_user['id'] ?></td>
      </tr>

      <tr>
        <td>Name</td>
        <td><?=ucwords($current_user['name']); ?></td>
      </tr>

      <tr>
        <td>Username</td>
        <td><?=$current_user['username'] ?></td>
      </tr>

      <tr>
        <td>E-mail</td>
        <td><?=$current_user['email'] ?></td>
      </tr>

      <tr>
        <td>Status</td>
        <td><?=ucwords($current_user['status']); ?></td>
      </tr>

      <tr>
        <td>SignUp Date</td>
        <td><?=$current_user['datetime'] ?></td>
      </tr>
    </table> 
    <a href="#" class="btn btn-sm btn-primary pull-right">Edit Profile</a>
  </div>
  <div class="col-sm-6">
    <a href="#">
      <img src="images/<?=$current_user['photo'] ?>" class="img-thumbnail" width="200px"; height="200px"; alt="pic" style="">
    </a> <br> <br>

    <?php
    if (isset($_POST['submit'])) {
      $photo = explode(".", $_FILES["photo"]["name"]);
      $photo_name = $session_user.".".end($photo);
      //echo $photo_name;
      $pic = mysqli_query($conn, "UPDATE `users` SET `photo`='$photo_name' WHERE `username` = '$session_user'");
      if ($pic) {
        move_uploaded_file($_FILES["photo"]["tmp_name"], 'images/'.$photo_name);
      }
    }
    ?>
    <form class="" action="" method="post" enctype="multipart/form-data">
      <label for="picture">Profile Picture</label>
      <input type="file" name="photo" id="picture" required> <br>
      <input type="submit" name="submit" value="Upload" class="btn btn-sm btn-success pull-none">
    </form>
  </div>
</div>
