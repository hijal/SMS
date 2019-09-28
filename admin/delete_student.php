<?php
  require_once 'dbconn.php';

  $id = base64_decode($_GET['id']);
  $del = "DELETE FROM `student_info` WHERE id=$id";
  mysqli_query($conn, $del);
  header('location: index.php?page=all_students');  

?>
