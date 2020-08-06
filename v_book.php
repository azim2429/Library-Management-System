<!DOCTYPE html>
<html lang="en">

<head>
  <title>View Book Details</title>
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

  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<?php
require 'connection.php';
$query = "select * from book where b_quant!=0";
$res = mysqli_query($conn, $query);
$query1 = "select * from book where b_quant=0";
$res1 = mysqli_query($conn, $query1);
$query2 = "select * from book ORDER BY b_name ";
$res2 = mysqli_query($conn, $query2);
$query3 = "select * from book  ORDER BY b_quant DESC";
$res3 = mysqli_query($conn, $query3);
$query4 = "select * from book  ORDER BY b_quant ASC";
$res4 = mysqli_query($conn, $query4);


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
  <form method="GET" action="v_book.php">
    <h4 style="margin-left: 20px;">Sort the books</h4>
    <button name="alpha" class="btn btn-dark" type="submit" style="margin-left: 40px; margin-top:20px;position:absolute;" >Alphabetical</button>
    <button name="quant_asc" class="btn btn-dark" type="submit" style="position:absolute; top:215px;left:40px;width:113px;">Quantity  <i class="fa fa-arrow-up"></i></button>
    <button name="quant_desc" class="btn btn-dark" type="submit" style="position:absolute;top:255px;left:40px;width:113px;">Quantity  <i class="fa fa-arrow-down"></i></button>
    <button name="quant_none" class="btn btn-dark" type="submit" style="position:absolute;top:295px;left:40px;width:113px;">Out Of Stock </button>
    
  </form>
  
  <?php  ?>
    <div class="container" style="margin-right: 115px;margin-top:30px;">
      <div class="row">
        <?php
         if (isset($_GET['alpha'])) {
        while ($row = mysqli_fetch_array($res2)) {
          $b_name =  $row['b_name'];
          $b_quant =  $row['b_quant'];
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
                  <img src="data:image/jpg;charset=utf8;base64,<?php echo $b_img ?>" style=" height:140px;width:120px;margin-left: 45px;border-radius:50%" style="width:120px;margin-left: 50px;">
                  </a>
                </div>
                <div class="card-body" style="text-align: center;font-weight: bolder;"><?php echo $b_quant; ?><span> Copies Left</div>
                <br>
                
                <a href="a_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-primary btn-sm" style="margin-left: 00px;">Allocate</a>
                    <a type="button" href="u_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-warning btn-sm" style="margin-left: 11px;">Edit</a>
                    <a type="button" href="u_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-danger btn-sm" style="margin-left: 11px;">Delete</a>
              </div>
            </div>
            <br>
          </div>




          <?php }else{ ?>
          <div class="col-sm-3">
            <div class="card shadow-lg">
              <div class="card-body">
                <a href="c_book.php?id=<?php echo $row['b_id']; ?>">
                  <h5 class="card-title" style="text-align: center;font-weight: bolder;"><?php echo $b_name; ?></h5>
                </a>

                <div class="login100-pic js-tilt" data-tilt>
                  <img src="images\bookimg.png" style="height:140px;width:120px;margin-left: 50px;">
                  </a>
                </div>
                <div class="card-body" style="text-align: center;font-weight: bolder;"><?php echo $b_quant; ?><span> Copies Left</div>
                <br>
                
                <a href="a_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-primary btn-sm" style="margin-left: 00px;">Allocate</a>
                    <a type="button" href="u_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-warning btn-sm" style="margin-left: 11px;">Edit</a>
                    <a type="button" href="u_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-danger btn-sm" style="margin-left: 11px;">Delete</a>
              </div>
            </div>
            <br>
          </div>
          <?php } }
      } else if (isset($_GET['quant_desc'])) {
         ?>
      </div>
    </div>
  
  <div class="container" style="margin-right: 115px;">
    <div class="row">
      <?php

        while ($row = mysqli_fetch_array($res3)) {
          $b_name =  $row['b_name'];
          $b_quant =  $row['b_quant'];
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
              <img src="data:image/jpg;charset=utf8;base64,<?php echo $b_img ?>" style=" height:140px;width:120px;margin-left: 45px;border-radius:50%" style="width:120px;margin-left: 50px;">
                </a>
              </div>
              <div class="card-body" style="text-align: center;font-weight: bolder;"><?php echo $b_quant; ?><span> Copies Left</div>
              <br>
              <a href="a_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-primary btn-sm" style="margin-left: 00px;">Allocate</a>
                    <a type="button" href="u_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-warning btn-sm" style="margin-left: 11px;">Edit</a>
                    <a type="button" href="u_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-danger btn-sm" style="margin-left: 11px;">Delete</a>
            </div>
          </div>
          <br>
        </div>


          <?php }else{?>
        <div class="col-sm-3">
          <div class="card shadow-lg">
            <div class="card-body">
              <a href="c_book.php?id=<?php echo $row['b_id']; ?>">
                <h5 class="card-title" style="text-align: center;font-weight: bolder;"><?php echo $b_name; ?></h5>
              </a>

              <div class="login100-pic js-tilt" data-tilt>
                <img src="images\bookimg.png" style="height:140px;width:120px;margin-left: 50px;">
                </a>
              </div>
              <div class="card-body" style="text-align: center;font-weight: bolder;"><?php echo $b_quant; ?><span> Copies Left</div>
              <br>
              <a href="a_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-primary btn-sm" style="margin-left: 00px;">Allocate</a>
                    <a type="button" href="u_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-warning btn-sm" style="margin-left: 11px;">Edit</a>
                    <a type="button" href="u_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-danger btn-sm" style="margin-left: 11px;">Delete</a>
            </div>
          </div>
          <br>
        </div>
        <?php }}
      } else if (isset($_GET['quant_asc'])) { ?>
    </div>
  </div>
  <div class="container" style="margin-right: 115px;">
    <div class="row">
      <?php

        while ($row = mysqli_fetch_array($res4)) {
          $b_name =  $row['b_name'];
          $b_quant =  $row['b_quant'];
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
              <img src="data:image/jpg;charset=utf8;base64,<?php echo $b_img ?>" style=" height:140px;width:120px;margin-left: 45px;border-radius:50%" style="width:120px;margin-left: 50px;">
                </a>
              </div>
              <div class="card-body" style="text-align: center;font-weight: bolder;"><?php echo $b_quant; ?><span> Copies Left</div>
              <br>
              <a href="a_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-primary btn-sm" style="margin-left: 00px;">Allocate</a>
                    <a type="button" href="u_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-warning btn-sm" style="margin-left: 11px;">Edit</a>
                    <a type="button" href="de_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-danger btn-sm" style="margin-left: 11px;">Delete</a>
            </div>
          </div>
          <br>
        </div>

          <?php } else { ?>
        <div class="col-sm-3">
          <div class="card shadow-lg">
            <div class="card-body">
              <a href="c_book.php?id=<?php echo $row['b_id']; ?>">
                <h5 class="card-title" style="text-align: center;font-weight: bolder;"><?php echo $b_name; ?></h5>
              </a>

              <div class="login100-pic js-tilt" data-tilt>
                <img src="images\bookimg.png" style="height:140px; width:120px;margin-left: 50px;">
                </a>
              </div>
              <div class="card-body" style="text-align: center;font-weight: bolder;"><?php echo $b_quant; ?><span> Copies Left</div>
              <br>
              <a href="a_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-primary btn-sm" style="margin-left: 00px;">Allocate</a>
                    <a type="button" href="u_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-warning btn-sm" style="margin-left: 11px;">Edit</a>
                    <a type="button" href="de_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-danger btn-sm" style="margin-left: 11px;">Delete</a>
            </div>
          </div>
          <br>
        </div>
        <?php } }
      } else if (isset($_GET['quant_none'])) { ?>


    </div>
  </div>
  <div class="container" style="margin-right: 130px;">
    <div class="row">
    <?php
        while ($row = mysqli_fetch_array($res1)) {
          $b_name =  $row['b_name'];
          $b_quant =  $row['b_quant'];
          $b_img =  base64_encode($row['b_img']);
          if($b_img){
    ?>
 <div class="col-sm-3">
        <div class="card shadow-lg">
          <div class="card-body">
            <a href="c_book.php?id=<?php echo $row['b_id']; ?>">
              <h5 class="card-title" style="text-align: center;font-weight: bolder;"><?php echo $b_name; ?></h5>
            </a>

            <div class="login100-pic" style="filter: blur(5px);">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo $b_img ?>" style=" height:140px;width:120px;margin-left: 45px;border-radius:50%" style="width:120px;margin-left: 50px;">

              </a>
            </div>
            <div class="card-body" style="text-align: center;font-weight: bolder;"><?php echo $b_quant; ?><span> Copies Left</div>
            <br>
            <a type="button" href="u_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-warning btn-sm" style="margin-left: 30px;">Update</a>
            <a type="button" href="de_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-danger btn-sm" style="margin-left: 20px;">Delete</a>
            <img src="images\download.png" style="width:120px;margin-left: 50px;position:absolute;top:90px;left:20px;">
          </div>
        </div>
        <br>
      </div>

          <?php }else{?>
      <div class="col-sm-3">
        <div class="card shadow-lg">
          <div class="card-body">
            <a href="c_book.php?id=<?php echo $row['b_id']; ?>">
              <h5 class="card-title" style="text-align: center;font-weight: bolder;"><?php echo $b_name; ?></h5>
            </a>

            <div class="login100-pic" style="filter: blur(5px);">
              <img src="images\bookimg.png" style="height:140px;width:120px;margin-left: 50px;">

              </a>
            </div>
            <div class="card-body" style="text-align: center;font-weight: bolder;"><?php echo $b_quant; ?><span> Copies Left</div>
            <br>
            <a type="button" href="u_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-warning btn-sm" style="margin-left: 30px;">Update</a>
            <a type="button" href="de_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-danger btn-sm" style="margin-left: 20px;">Delete</a>
            <img src="images\download.png" style="width:120px;margin-left: 50px;position:absolute;top:90px;left:20px;">
          </div>
        </div>
        <br>
      </div>
      
    <?php } } }else{?>

    </div></div>





<div class="container" style="margin-right: 115px;margin-top:5px;">
  <div class="row">
    <?php
        while ($row = mysqli_fetch_array($res)) {
          $b_name =  $row['b_name'];
          $b_quant =  $row['b_quant'];
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
            <img src="data:image/jpg;charset=utf8;base64,<?php echo $b_img ?>" style=" height:140px;width:120px;margin-left: 45px;border-radius:50%" style="width:120px;margin-left: 50px;">
              </a>
            </div>
            <div class="card-body" style="text-align: center;font-weight: bolder;"><?php echo $b_quant; ?><span> Copies Left</div>
            <br>
            <a href="a_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-primary btn-sm" style="margin-left: 00px;">Allocate</a>
                    <a type="button" href="u_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-warning btn-sm" style="margin-left: 11px;">Edit</a>
                    <a type="button" href="de_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-danger btn-sm" style="margin-left: 11px;">Delete</a>
          </div>
        </div>
        <br>
      </div>


    <?php }else{?>
      <div class="col-sm-3">
        <div class="card shadow-lg">
          <div class="card-body">
            <a href="c_book.php?id=<?php echo $row['b_id']; ?>">
              <h5 class="card-title" style="text-align: center;font-weight: bolder;"><?php echo $b_name; ?></h5>
            </a>

            <div class="login100-pic js-tilt" data-tilt>
              <img src="images\bookimg.png" style="height:140px;width:120px;margin-left: 50px;">
              </a>
            </div>
            <div class="card-body" style="text-align: center;font-weight: bolder;"><?php echo $b_quant; ?><span> Copies Left</div>
            <br>
            <a href="a_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-primary btn-sm" style="margin-left: 00px;">Allocate</a>
                    <a type="button" href="u_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-warning btn-sm" style="margin-left: 11px;">Edit</a>
                    <a type="button" href="de_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-danger btn-sm" style="margin-left: 11px;">Delete</a>
          </div>
        </div>
        <br>
      </div>
    <?php } }?>
    <?php
        while ($row = mysqli_fetch_array($res1)) {
          $b_name =  $row['b_name'];
          $b_quant =  $row['b_quant'];
          $b_img =  base64_encode($row['b_img']);
          if($b_img){
    ?>
 <div class="col-sm-3">
        <div class="card shadow-lg">
          <div class="card-body">
            <a href="c_book.php?id=<?php echo $row['b_id']; ?>">
              <h5 class="card-title" style="text-align: center;font-weight: bolder;"><?php echo $b_name; ?></h5>
            </a>

            <div class="login100-pic" style="filter: blur(5px);">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo $b_img ?>" style=" height:140px;width:120px;margin-left: 45px;border-radius:50%" style="width:120px;margin-left: 50px;">

              </a>
            </div>
            <div class="card-body" style="text-align: center;font-weight: bolder;"><?php echo $b_quant; ?><span> Copies Left</div>
            <br>
            <a type="button" href="u_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-warning btn-sm" style="margin-left: 30px;">Update</a>
            <a type="button" href="de_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-danger btn-sm" style="margin-left: 20px;">Delete</a>
            <img src="images\download.png" style="width:120px;margin-left: 50px;position:absolute;top:90px;left:20px;">
          </div>
        </div>
        <br>
      </div>
          <?php }else{?>
      <div class="col-sm-3">
        <div class="card shadow-lg">
          <div class="card-body">
            <a href="c_book.php?id=<?php echo $row['b_id']; ?>">
              <h5 class="card-title" style="text-align: center;font-weight: bolder;"><?php echo $b_name; ?></h5>
            </a>

            <div class="login100-pic" style="filter: blur(5px);">
              <img src="images\bookimg.png" style="height:140px; width:120px;margin-left: 50px;">

              </a>
            </div>
            <div class="card-body" style="text-align: center;font-weight: bolder;"><?php echo $b_quant; ?><span> Copies Left</div>
            <br>
            <a type="button" href="u_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-warning btn-sm" style="margin-left: 30px;">Update</a>
            <a type="button" href="de_book.php?id=<?php echo $row['b_id']; ?>" class="btn btn-danger btn-sm" style="margin-left: 20px;">Delete</a>
            <img src="images\download.png" style="width:120px;margin-left: 50px;position:absolute;top:90px;left:20px;">
          </div>
        </div>
        <br>
      </div>

    <?php }} ?>
  </div>
</div>




<?php } ?>
<div class="sea" style="position: absolute; top:130px;left:775px;" >
        <form action="b_search.php" method="GET">
  <input type="search" name="search" placeholder="Search Book Name or Book ID">
  <button type="submit" name="search_book" class="fa fa-search"></button>
</form>
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
    border: 4px solid #1b9bff;
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
    border-color: black;
    
    font-size: 1em;
    border-radius: 20px;
    padding: 0 20px;
    color:#1b9bff;
}

.fa-search{
    box-sizing: border-box;
    padding: 10px;
    width: 42.5px;
    height: 42.5px;
    position: absolute;
    top: 0;
    right: 0;
    border-radius: 50%;
    color: #1b9bff;
    text-align: center;
    font-size: 1.2em;
    transition: all 1s;
}

.sea:hover{
    width: 400px;
    cursor: pointer;
}

.sea:hover input{
    display: block;
}

.sea:hover {
    
    color: #0082e6;
}
.fa-search{
  color: #1b9bff;
}
input[placeholder], [placeholder], *[placeholder] {
    color: grey !important;
}
 /* .contain{
  display: block;
  position: absolute;
  
  height: auto;
  width: 250px;
  padding: 20px;
}

.contain h2 {
	color: #AAAAAA;
}

.contain ul{
  list-style: none;
  margin: 0;
  padding: 0;
	overflow: auto;
}

.contain ul li{
  color: #AAAAAA;
  display: block;
  position: relative;
  float: left;
  width: 200px;
  height: 100px;
	
}

.contain ul li input[type=radio]{
  position: absolute;
  visibility: hidden;
}

.contain ul li label{
  display: block;
  position: relative;
  font-weight: 300;
  font-size: 1.35em;
  padding: 25px 25px 25px 80px;
  margin: 10px auto;
  height: 30px;
  z-index: 9;
  cursor: pointer;
  -webkit-transition: all 0.25s linear;
}

.contain ul li:hover label{
	color: #1b9bff;
}

.contain ul li .check{
  display: block;
  position: absolute;
  border: 5px solid #AAAAAA;
  border-radius: 100%;
  height: 25px;
  width: 25px;
  top: 30px;
  left: 20px;
	z-index: 5;
	transition: border .25s linear;
	-webkit-transition: border .25s linear;
}

.contain ul li:hover .check {
  border: 5px solid #1b9bff;
}

.contain ul li .check::before {
  display: block;
  position: absolute;
	content: '';
  border-radius: 100%;
  height: 15px;
  width: 15px;
  top: 5px;
	left: 5px;
  margin: auto;
	transition: background 0.25s linear;
	-webkit-transition: background 0.25s linear;
}

input[type=radio]:checked ~ .check {
  border: 5px solid #1b9bff;
}

input[type=radio]:checked ~ .check::before{
  background: #0DFF92;
}

input[type=radio]:checked ~ label{
  color: #1b9bff;
}*/
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

  img:hover {
    background: white;
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