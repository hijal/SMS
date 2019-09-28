<h1 class="text-primary"><i class="fa fa-users"></i> All Users <small>All Users</small> </h1>
<ol class="breadcrumb">
  <li><a href="index.php?page=dashboard"><i class="fa fa-tachometer"></i> Dashboard</a></li>
  <li><i class="fa fa-users"></i> All Users</li>
</ol>
<div class="table-responsive">
  <table id="data" class="table table-hover table-bordered">
    <thead>
      <tr>
        <td>ID</td>
        <td>Name</td>
        <td>E-mail</td>
        <td>Username</td>
        <td>photo</td>
      </tr>
    </thead>
    <tbody>

      <?php
        $users = mysqli_query($conn, "SELECT * FROM `users`");
        //print_r($students);
        while ($row = mysqli_fetch_assoc($users)) {
          ?>
          <tr>
            <td><?php echo ucwords($row['name']); ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td>
              <img src="images/<?php echo $row['photo']; ?>" style="width:100px; height:100px;" alt="photo">
            </td>
          </tr>
          <?php
        }
      ?>
    </tbody>
  </table>
</div>
