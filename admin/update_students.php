<h1 class="text-primary"><i class="fa fa-pencil-square-o"></i> Update Student <small>Update Students</small> </h1>
<ol class="breadcrumb">
  <li><a href="index.php?page=dashboard"><i class="fa fa-tachometer"></i> Dashboard</a></li>
  <li><a href="index.php?page=all_students"><i class="fa fa-users"></i> All Students</a></li>
  <li class="active"><i class="fa fa-pencil"></i> Update students</li>
</ol>

<?php
  require_once "dbconn.php";
  $id = base64_decode($_GET['id']);
  $data = mysqli_query($conn, "SELECT * FROM `student_info` WHERE id=$id");
  //print_r($data);
  $db_row = mysqli_fetch_assoc($data);
  //print_r($db_row);
  if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $class = $_POST['class'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];

    $result = mysqli_query($conn, "UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`contact`='$contact' WHERE `id` = '$id'");
    //echo $result;
    if ($result) {
      header('location: index.php?page=all_students');
    }
  }
?>

<div class="row">
  <div class="col-sm-6">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Student Name</label>
        <input class="form-control" type="text" id="name" name="name" placeholder="Student Name" required value="<?=$db_row['name'] ?>">
      </div>
      <div class="form-group">
        <label for="roll">Roll</label>
        <input class="form-control" type="text" id="roll" name="roll" value="<?=$db_row['roll'] ?>" placeholder="Roll" pattern="[0-9]{6}" required>
      </div>
      <div class="form-group">
        <label for="class">Class</label>
        <select class="form-control" id="class" name="class" required>
          <option value="">Select</option>
          <option <?php echo $db_row['class']=='1' ? 'selected=""':''; ?> value="1">1st</option>
          <option <?php echo $db_row['class']=='2' ? 'selected=""':''; ?> value="2">2nd</option>
          <option <?php echo $db_row['class']=='3' ? 'selected=""':''; ?> value="3">3rd</option>
          <option <?php echo $db_row['class']=='4' ? 'selected=""':''; ?> value="4">4th</option>
          <option <?php echo $db_row['class']=='5' ? 'selected=""':''; ?> value="5">5th</option>
        </select>
      </div>
      <div class="form-group">
        <label for="city">City</label>
        <input class="form-control" type="text" value="<?=$db_row['city'] ?>" id="city" name="city" placeholder="City" required>
      </div>
      <div class="form-group">
        <label for="contact">Contact</label>
        <input class="form-control" value="<?=$db_row['contact'] ?>" type="text" id="contact" name="contact" placeholder="01*********" required pattern="01[1|5|6|7|8|9][0-9]{8}">
      </div>
      <input type="submit" name="update" value="Update Student" class="btn btn-primary">
      <div class="form-group">

      </div>
    </form>
  </div>
</div>
