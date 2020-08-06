<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home-Page</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <link rel="icon" type="image/png" href="images/icons/circle-cropped.png" />

  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">


  <link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<?php
require 'connection.php';
$query = "select * from book where b_quant>50 ";
$res = mysqli_query($conn, $query);


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
  <br><br>
        <div class="container" style="margin-top: 10px;">
          <div class="row">
            <?php

            while ($row = mysqli_fetch_array($res)) {
              $b_name =  $row['b_name'];
              $b_author =  $row['b_author'];
              $b_img =  base64_encode($row['b_img']);
              if($b_img){
            ?>
              <div class="col-sm-3">
                <div class="card shadow-lg">
                  <div class="card-body">
                    <a href="c_book.php?id=<?php echo $row['b_id']; ?>">
                      <h5 class="card-title" style="text-align: center;font-weight: bolder;"><?php echo $b_name; ?></h5>
                    </a>
                    
                    <div class="login100-pic js-tilt" data-tilt>

                      <img id="img" src="data:image/jpg;charset=utf8;base64,<?php echo $b_img ?>" style=" height:140px;width:120px;margin-left: 45px;border-radius:50%"></a>
                    </div>
                    <div class="card-body" style="text-align: center;font-weight: bolder;"><?php echo $b_author; ?></div>
                    <br>
                    <a href="a_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-primary" style="margin-left: 40px;">Allocate Book</a>
                  </div>
                </div>
                <br>
              </div>
              <br>
          <?php }else{
           ?>
           <div class="col-sm-3">
                <div class="card shadow-lg">
                  <div class="card-body">
                    <a href="c_book.php?id=<?php echo $row['b_id']; ?>">
                      <h5 class="card-title" style="text-align: center;font-weight: bolder;"><?php echo $b_name; ?></h5>
                    </a>
                    <div class="login100-pic js-tilt" data-tilt>

                      <img id="img" src="images\bookimg.png" style="height:140px; width:120px;margin-left: 50px;"></a>
                    </div>
                    <div class="card-body" style="text-align: center;font-weight: bolder;"><?php echo $b_author; ?></div>
                    <br>
                    <a href="a_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-primary" style="margin-left: 40px;">Allocate Book</a>
                  </div>
                </div>
                <br>
              </div>

          <?php } } ?>
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
  .sea{
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    transition: all 1s;
    width: 50px;
    height: 50px;
    background: white;
    box-sizing: border-box;
    border-radius: 25px;
    border: 4px solid white;
    padding: 5px;
}

input{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;;
    height: 42.5px;
    line-height: 30px;
    outline: 0;
    border: 2;
    background-color: #D3D3D3;
    font-size: 1em;
    border-radius: 20px;
    padding: 0 20px;
}

.fa{
    box-sizing: border-box;
    padding: 10px;
    width: 42.5px;
    height: 42.5px;
    position: absolute;
    top: 0;
    right: 0;
    border-radius: 50%;
    color: #0082e6;
    text-align: center;
    font-size: 1.2em;
    transition: all 1s;
}

.sea:hover{
    width: 200px;
    cursor: pointer;
}

.sea:hover input{
    display: block;
}

.sea:hover .fa{
    
    color: #0082e6;
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
</style>

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