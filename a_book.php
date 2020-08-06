<!DOCTYPE html>
<html lang="en">

<head>
  <title>Book Allocation</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/png" href="images/icons/circle-cropped.png" />

  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<?php
require 'connection.php';

$query = "select * from book where b_id=" . $_GET['id'];
$res = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row = mysqli_fetch_array($res);

?>



<body>
  <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <label class="logo">Library</label>
    <ul>
      <li><a class="active" href="index.php">Home</a></li>
      <li><a href="student.html">Enter Student</a></li>
      <li><a href="v_stud.php">View Student</a></li>
      <li><a href="book.html">Enter Book</a></li>
      <li><a href="v_book.php">View Book</a></li>
    </ul>
  </nav>

  <div class="limiter">
    <div class="container-login100" style="background: #f5faff;">
      <div class="wrap-login100" style="background-color: #0082e6;width: 380px;height: 600px;">


        <form class="login100-form validate-form" style="position: relative; bottom:135px;right: 40px;" method="POST" action="alloc.php?id=<?php echo $row['b_id']; ?>">
          <span class="login100-form-title" style="color: white;">
            Student Register
          </span>

          <div class="wrap-input100 validate-input" data-validate="Book Name is required">
            <input class="input100" type="text" value="<?php echo $row['b_name']; ?>" name="b_name" readonly>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-book" aria-hidden="true"></i>
            </span>

          </div>
          <div class="wrap-input100 validate-input" data-validate="Book Name is required">
            <input class="input100" type="number" value="<?php echo $row['b_id']; ?>" name="b_id" readonly>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-id-card-o" aria-hidden="true"></i>
            </span>

          </div>
          <div class="wrap-input100 validate-input" data-validate="Name is required">
            <input class="input100" type="text" name="s_name" placeholder="Enter Student Name">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user" aria-hidden="true"></i>
            </span>
          </div>
          <div class="wrap-input100 validate-input" style="position:relative;top: 2px;">
            <input class="input100" type="number" name="s_roll" placeholder="Enter Student Roll Number" data-validate="Roll Number is required">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-copy" aria-hidden="true"></i>
            </span>
          </div>
          <div class="wrap-input100 validate-input" style="position:relative;top: 2px;">
            <input class="input100" type="date" name="b_date" placeholder="Enter Date" data-validate="Borrowed Date">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-calendar" aria-hidden="true"></i>
            </span>

          </div>
          <div class="wrap-input100 validate-input" style="position:relative;top: 2px;">
            <input class="input100" type="date" name="r_date" placeholder="Enter Date" data-validate="Return Date">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-calendar" aria-hidden="true"></i>
            </span>
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn" name="register" type="submit">
              Register Student
            </button>
            <br>
          </div>
          <br>
        </form>
        <br>
      </div>
      <br>
    </div>
  </div>






  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>

  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="vendor/select2/select2.min.js"></script>

  <script src="vendor/tilt/tilt.jquery.min.js"></script>
  <script>
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>

  <script src="js/main.js"></script>

</body>

</html>
<style>
  @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    list-style: none;
    text-decoration: none;
  }

  nav {
    background: #0082e6;
    height: 80px;
    width: 100%;
  }

  label.logo {
    color: white;
    font-size: 33px;
    line-height: 80px;
    padding: 0 140px;
    font-weight: 600;
    font-family: 'Poppins', sans-serif;
  }

  nav ul {
    float: right;
    margin-right: 60px;
  }

  nav ul li {
    display: inline-block;
    line-height: 80px;
    margin: 0 2px;
  }

  nav ul li a {
    color: #f2f2f2;
    font-weight: 500;
    font-size: 20px;
    padding: 7px 13px;
    border-radius: 3px;
    /* text-transform: uppercase; */
    font-family: 'Poppins', sans-serif;
  }

  a.active,
  a:hover {
    background: #1b9bff;
    transition: .5s;
    color: white;
  }

  .checkbtn {
    font-size: 30px;
    color: white;
    float: right;
    line-height: 80px;
    margin-right: 40px;
    cursor: pointer;
    display: none;
  }

  #check {
    display: none;
  }

  @media (max-width: 952px) {
    label.logo {
      font-size: 27px;
      padding-left: 25px;
    }

    nav ul li a {
      font-size: 16px;
    }
  }

  @media (max-width: 858px) {
    .checkbtn {
      display: block;
      margin-right: 40px;
    }

    ul {
      position: fixed;
      width: 100%;
      height: 100vh;
      background: #2c3e50;
      top: 80px;
      left: -100%;
      text-align: center;
      transition: all .5s;
    }

    nav ul li {
      display: block;
      margin: 50px 0;
      line-height: 30px;
    }

    nav ul li a {
      font-size: 20px;
    }

    a:hover,
    a.active {
      background: none;
      color: #0082e6;
    }

    #check:checked~ul {
      left: 0;
    }
  }

  section {
    background: url(bg1.jpg) no-repeat;
    background-size: cover;
    height: calc(100vh - 80px);
  }

  textarea,
  input {
    background-color: white;
    color: #000;
  }
</style>