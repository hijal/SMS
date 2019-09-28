<h1 class="text-primary"><i class="fa fa-user-plus"></i> Add Student <small>Add New Students</small> </h1>
<ol class="breadcrumb">
  <li><a href="index.php?page=dashboard.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
  <li class="active"><i class="fa fa-user-plus"></i> add students</li>
</ol>

<?php


  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $class = $_POST['class'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];
    $pic =  $_FILES['picture']['name'];
    $picture = explode('.', $pic);
    $pic_ex = end($picture);
    $final_pic = $roll.'.'.$pic_ex;
    //print_r($final_pic);

    $query = "INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `contact`, `photo`)
    VALUES ('$name', '$roll', '$class', '$city', '$contact', '$final_pic')";
    $result = mysqli_query($conn, $query);
    //print_r();
    //echo $result;
    if ($result) {
      $success = "Data Insert Success";
      move_uploaded_file($_FILES['picture']['tmp_name'], 'student_images/'.$final_pic);
    }
    else {
      $error = "Data Not Insert";
    }
  }

?>


<div class="row">
  <?php
    if (isset($success)) {
      echo '<p class="alert alert-success alert-dismissible col-sm-6">'.$success.'</p>';
    }
  ?>
  <?php
    if (isset($error)) {
      echo '<p class="alert alert-success alert-dismissible col-sm-6">'.$error.'</p>';
    }
  ?>

</div>
<div class="row">
  <div class="col-sm-6">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Student Name</label>
        <input class="form-control" type="text" id="name" name="name" placeholder="Student Name" required>
      </div>
      <div class="form-group">
        <label for="roll">Roll</label>
        <input class="form-control" type="text" id="roll" name="roll" placeholder="Roll" pattern="[0-9]{6}" required>
      </div>
      <div class="form-group">
        <label for="class">Class</label>
        <select class="form-control" id="class" name="class" required>
          <option value="">Select</option>
          <option value="1st">1st</option>
          <option value="2nd">2nd</option>
          <option value="3rd">3rd</option>
          <option value="4th">4th</option>
          <option value="5th">5th</option>
        </select>
      </div>
      <div class="form-group">
        <label for="city">City</label>
        <input class="form-control" type="text" id="city" name="city" placeholder="City" required>
      </div>
      <div class="form-group">
        <label for="contact">Contact</label>
        <input class="form-control" type="text" id="contact" name="contact" placeholder="01*********" required pattern="01[1|5|6|7|8|9][0-9]{8}">
      </div>
      <div class="form-group">
        <label for="picture">Picture</label>
        <input type="file" id="picture" name="picture">
      </div>
      <input type="submit" name="submit" value="Add Student" class="btn btn-primary">
      <div class="form-group">

      </div>
    </form>
  </div>
</div>
