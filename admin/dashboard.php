<h1 class="text-primary"><i class="fa fa-tachometer"></i> Add Student <small>Statistics</small> </h1>
<ol class="breadcrumb">
  <li><a href="index.php?page=dashboard"><i class="fa fa-tachometer"></i> Dashboard</a></li>
</ol>
<?php
  $count_student = mysqli_query($conn, "SELECT * FROM `student_info`");
  $total_student = mysqli_num_rows($count_student);
  $count_user = mysqli_query($conn, "SELECT * FROM `users`");
  $total_user = mysqli_num_rows($count_user);

?>
<div class="row">
  <div class="col-sm-4">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-users fa-5x"></i>
          </div>
          <div class="col-xs-9">
            <div class="pull-right" style="font-size:45px;">
              <?php echo $total_student; ?>
            </div>
            <div class="clearfix">

            </div>
            <div class="pull-right">
              All Students
            </div>
          </div>
        </div>
      </div>
      <a href="index.php?page=all_students">
        <div class="panel-footer">
          <span class="pull-left">All Students</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix">

          </div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-users fa-5x"></i>
          </div>
          <div class="col-xs-9">
            <div class="pull-right" style="font-size:45px;">
              <?php echo $total_user; ?>
            </div>
            <div class="clearfix">

            </div>
            <div class="pull-right">
              All Users
            </div>
          </div>
        </div>
      </div>
      <a href="index.php?page=all_users">
        <div class="panel-footer">
          <span class="pull-left">All Users</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix">

          </div>
        </div>
      </a>
    </div>
  </div>
  <!-- <div class="col-sm-4">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-users fa-5x"></i>
          </div>
          <div class="col-xs-9">
            <div class="pull-right" style="font-size:45px;">
              10
            </div>
            <div class="clearfix">

            </div>
            <div class="pull-right">
              All Students
            </div>
          </div>
        </div>
      </div>
      <a href="#">
        <div class="panel-footer">
          <span class="pull-left">All Students</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix">

          </div>
        </div>
      </a>
    </div>
  </div> -->
</div>
<hr> <hr>
<h1>New Students</h1>
<div class="table-responsive">
  <table id="data" class="table table-hover table-bordered">
    <thead>
      <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Roll</td>
        <td>Class</td>
        <td>City</td>
        <td>Contact</td>
        <td>Photo</td>
      </tr>
    </thead>
    <tbody>

      <?php
        $students = mysqli_query($conn, "SELECT * FROM `student_info`");
        //print_r($students);
        while ($row = mysqli_fetch_assoc($students)) {
          ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo ucwords($row['name']); ?></td>
            <td><?php echo $row['roll']; ?></td>
            <td><?php echo $row['class']; ?></td>
            <td><?php echo ucwords($row['city']); ?></td>
            <td><?php echo $row['contact']; ?></td>
            <td>
              <img src="student_images/<?php echo $row['photo']; ?>" style="width:100px; height:100px;" alt="photo">
            </td>
          </tr>
          <?php

        }
      ?>
    </tbody>
  </table>
</div>
