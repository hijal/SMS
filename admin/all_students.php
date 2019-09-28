<h1 class="text-primary"><i class="fa fa-users"></i> All Student <small>All Students</small> </h1>
<ol class="breadcrumb">
  <li><a href="index.php?page=dashboard"><i class="fa fa-tachometer"></i> Dashboard</a></li>
  <li class="active"><i class="fa fa-users"></i> All students</li>
</ol>
<div class="table-responsive">
  <table id="data" class="table table-hover table-bordered">
    <thead>
      <tr>
        <td>Name</td>
        <td>Roll</td>
        <td>Class</td>
        <td>City</td>
        <td>Contact</td>
        <td>Photo</td>
        <td>Actions</td>
      </tr>
    </thead>
    <tbody>

      <?php
        $students = mysqli_query($conn, "SELECT * FROM `student_info`");
        //print_r($students);
        while ($row = mysqli_fetch_assoc($students)) {
          ?>
          <tr>
            <td><?php echo ucwords($row['name']); ?></td>
            <td><?php echo $row['roll']; ?></td>
            <td><?php echo $row['class']; ?></td>
            <td><?php echo ucwords($row['city']); ?></td>
            <td><?php echo $row['contact']; ?></td>
            <td>
              <img src="student_images/<?php echo $row['photo']; ?>" style="width:100px; height:100px;" alt="photo">
            </td>
            <td>
              <a href="index.php?page=update_students&id=<?php echo base64_encode( $row['id']); ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit</a> &nbsp;&nbsp;&nbsp;
              <a href="delete_student.php?id=<?php echo base64_encode( $row['id']); ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
            </td>
          </tr>
          <?php

        }
      ?>
    </tbody>
  </table>
</div>
