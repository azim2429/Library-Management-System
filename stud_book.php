<!DOCTYPE html>
<html lang="en">

<head>
  <title>Student Borrowed Books</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/png" href="images/icons/circle-cropped.png" />

  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

  <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">

  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

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
  $query = "select * from alloc where b_id=" . $_GET['id'];
  $res = mysqli_query($conn, $query);




  ?>


  <div class="limiter1">
    <div class="container-table100" style="position: absolute; ">
      <div class="wrap-table100" style="width:800px;">
        <div class="table100 ver1 m-b-110">
          <div class="table100-head">
            <table>
              <thead>
                <tr class="row100 head">
                  <th class="cell100 column1 " style="font-weight: bolder;">Student Name</th>
                  <th class="cell100 column2" style="font-weight: bolder;">Roll Number</th>
                  <th class="cell100 column3" style="font-weight: bolder;">Borrowed Date</th>
                  
                </tr>
              </thead>
            </table>
          </div>
          <?php
          while ($row = mysqli_fetch_array($res)) {
            $s_name =  $row['s_name'];
            $s_roll =  $row['s_roll'];
            $b_date =  $row['b_date'];
            $r_date =  $row['r_date'];
            
            $b_name = $row['b_name']; 
            $newDate = date("d-m-Y", strtotime($b_date));
            $newDate1 = date("d-m-Y", strtotime($r_date));?>
            <div class="table100-body js-pscroll">
              <table>
                <tbody>
                  <tr class="row100 body">
                    <td class="cell100 column1" style="font-weight: bold;"><?php echo $s_name; ?></td>
                    <td class="cell100 column2" style="font-weight: bold;"><?php echo $s_roll; ?></td>
                    <td class="cell100 column3" style="font-weight: bold;"><?php echo $newDate; ?></td>
                    <td class="cell100 column4" style="font-weight: bold;"><?php echo $newDate1; ?></td>
                    
                  </tr>

                </tbody>

              </table><hr>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>




  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>

  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="vendor/select2/select2.min.js"></script>

  <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script>
    $('.js-pscroll').each(function() {
      var ps = new PerfectScrollbar(this);

      $(window).on('resize', function() {
        ps.update();
      })
    });
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
</style>