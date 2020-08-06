<!DOCTYPE html>
<html lang="en">

<head>
	<title>Update Details</title>
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
include 'connection.php';
$query = "select * from student where s_roll=" . $_GET['id'];
$res = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row = mysqli_fetch_array($res);
$s_img =  base64_encode($row['s_img']);
?>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			<?php if($s_img){?>
				<div class="login100-pic js-tilt" data-tilt>
				<img src="data:image/jpg;charset=utf8;base64,<?php echo $s_img ?>" style="height: 350px;"/>
				</div>
				<?php }else {?>
					<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>
				<?php   } ?>
				<form class="login100-form validate-form" style="position: relative; bottom:135px;" method="POST" action="up_stud.php?id=<?php echo $_GET['id']; ?>">
					<span class="login100-form-title">
						Edit Information
					</span>
					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<input class="input100" type="text" value="<?php echo $row['s_name']; ?>" name="s_name" placeholder="Enter Student Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" value="<?php echo $row['s_mail']; ?>" name="s_mail" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Phone Number is required">
						<input class="input100" type="tel" name="s_phone" value="<?php echo $row['s_phone']; ?>" placeholder="Enter Student Phone Number">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-mobile" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" style="position:relative;top: 2px;" data-validate="Gender is required">
						<input class="input100" type="text" name="s_gender" value="<?php echo $row['s_gender']; ?>" placeholder="Enter Student Sex">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-venus-mars" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" style="position:relative;top: 2px;" data-validate="Branch is required">
						<input class="input100" type="text" name="s_branch" value="<?php echo $row['s_branch']; ?>" placeholder="Enter Student Branch">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-university" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" style="position:relative;top: 2px;" data-validate="Semester is required">
						<input class="input100" type="number" name="s_sem" value="<?php echo $row['s_sem']; ?>" placeholder="Enter Student Semester">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-book" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" style="position:relative;top: 2px;">
						<input class="input100" type="number" name="s_roll" value="<?php echo $row['s_roll']; ?>" placeholder="Enter Student Roll Number" data-validate="Roll Number is required" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-card-o" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="register" type="submit">
							Confirm Changes
						</button>
					</div>
				</form>
			</div>
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