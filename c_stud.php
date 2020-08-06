<!DOCTYPE html>
<html lang="en">

<head>
  <title>Student Details</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="icon" type="image/png" href="images/icons/circle-cropped.png" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

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
  <?php
  include 'connection.php';
  $query = "select * from student where s_roll=" . $_GET['id'];
  $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
  $row = mysqli_fetch_array($res);
  $sql = "select count(*) as total from alloc where s_roll=" . $_GET['id'];
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($result);

  ?>
  <div class="card card-pricing popular shadow text-center px-3 mb-4" style="width: 600px;position: relative;top:100px;left:500px;">
    <span class="h3 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">STUDENT</span>
    <div class="bg-transparent card-header pt-4 border-0">
      <h1 class="h1 font-weight-bolder text-primary text-center mb-0" data-pricing-value="30"><?php echo $row['s_name']; ?></h1>
    </div>
    <div class="card-body pt-0">
      <ul class="list-unstyled mb-4">
        <li class="h4"><span style="font-weight: bolder;">Roll Number: </span><i style="color: black;"> <?php echo $row['s_roll']; ?></i></li>
        <li class="h4"><span style="font-weight: bolder;">Phone Number: </span> <i style="color: black;"><?php echo $row['s_phone']; ?></i></li>
        <li class="h4"><span style="font-weight: bolder;">Gender: </span> <i style="color: black;"><?php echo $row['s_gender']; ?><i></li>
        <li class="h4"><span style="font-weight: bolder;">Branch: </span> <i style="color: black;"> <?php echo $row['s_branch']; ?><i></li>
        <li class="h4"><span style="font-weight: bolder;">Semester: </span> <i style="color: black;"><?php echo $row['s_sem']; ?><i></li>
        <li class="h4"><span style="font-weight: bolder;">Mail ID: </span> <i style="color: black;"><?php echo $row['s_mail']; ?><i></li>
        <li class="h4"><span style="font-weight: bolder;">Books Borrowed: <i style="color: black;"></span> <?php echo $data['total']; ?></i></li>

      </ul>
      <a href="book_stud.php?id=<?php echo $row['s_roll']; ?>" class="btn btn-primary btn-lg mb-3"><?php echo $data['total']; ?><span> Copies</span></a>
    </div>
  </div>
</body>

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
    color: white;
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
    transition: .8s;
    color: white;
  }

  h5:hover {
    color: #1b9bff;
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

  .card-pricing.popular {
    z-index: 1;
    border: 3px solid #007bff;
  }

  .card-pricing .list-unstyled li {
    padding: .5rem 0;
    color: #6c757d;
  }
</style>