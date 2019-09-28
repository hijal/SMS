<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <title>Student Management System</title>
  </head>
  <body>

    <div class="container">
      <br>
      <a class="btn btn-primary pull-right" href="admin/login.php">Login</a> <br> <br>
      <h1 class="text-center">Welcome to Student Management System</h1>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <form action="" method="post">
            <table class="table table-bordered">
              <tr>
                <td colspan="2" class="text-center">Student Information</td>
              </tr>

              <tr>
                <td>
                  <label for="choose">Choose Class</label>
                </td>
                <td>
                  <select required class="form-control" id="choose" name="choose">
                    <option value="">Select</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                    <option value="5th">5th</option>
                  </select>
                </td>
              </tr>

              <tr>
                <td>
                  <label for="roll">Roll</label>
                </td>
                <td>
                  <input class="form-control" type="text" name="roll" required pattern="[0-9]{6}" placeholder="Write Your 6 digit Roll No">
                </td>
              </tr>

              <tr>
                <td colspan="2" class="text-center">
                  <input class="btn btn-default" type="submit" name="submit" value="Show Info">
                </td>
              </tr>
            </table>
          </form>

        </div>
      </div>
      <br> <br>

      <?php
        require_once './admin/dbconn.php';
        if (isset($_POST['submit'])) {
            $choose = $_POST['choose'];
            //echo $choose;
            $roll = $_POST['roll'];
            $result = mysqli_query($conn, "SELECT * FROM `student_info` WHERE class = '$choose' and roll = '$roll'");
            if (mysqli_num_rows($result) == 1) {
              $row = mysqli_fetch_assoc($result);
              //print_r($row);
              ?>
              <div class="row">
                <div class="col-sm-8 col-sm-offset-3">
                  <table class="table table-bordered">
                    <tr>
                      <td rowspan="5">
                        <img src="./admin/student_images/<?= $row['photo'] ?>" class="img-thumbnail" style="width:200px; height:200px;" alt="photo">
                      </td>
                      <td>Name</td>
                      <td><?= ucwords($row['name']); ?></td>
                    </tr>
                    <tr>
                      <td>Roll</td>
                      <td><?= $row['roll'] ?></td>
                    </tr>
                    <tr>
                      <td>Class</td>
                      <td><?= $row['class'] ?></td>
                    </tr>
                    <tr>
                      <td>City</td>
                      <td><?= ucwords($row['city']); ?></td>
                    </tr>
                    <tr>
                      <td>Contact</td>
                      <td><?= $row['contact'] ?></td>
                    </tr>
                  </table>
                </div>
              </div>
          <?php
            }
            else {
              ?>
              <script type="text/javascript">
                alert("Data Not Found!!");
              </script>
              <?php
            }
            //print_r($result);
          ?>

          <?php
        }
      ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
