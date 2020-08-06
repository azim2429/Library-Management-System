<!DOCTYPE html>
<html lang="en">

<head>
	<title>Edit Book</title>
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
$query = "select * from book where b_id=" . $_GET['id'];
$res = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row = mysqli_fetch_array($res);
$b_img =  base64_encode($row['b_img']);
?>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<?php if($b_img){?>
				<div class="login100-pic js-tilt" data-tilt>
					
					<img src="data:image/jpg;charset=utf8;base64,<?php echo $b_img ?>"style="height: 350px;"/>
				</div>
				<?php }else {?>
					<div class="login100-pic js-tilt" data-tilt>
					<img src="images\bookimg.png" alt="IMG">
				</div>
					<?php   } ?>

				<form class="login100-form validate-form" style="position: relative;bottom: 105px;" method="POST" action="up_book.php?id=<?php echo $_GET['id']; ?>">
					<span class="login100-form-title">
						Edit Information
					</span>

					<div class="wrap-input100 validate-input" data-validate="Book Name is required">
						<input class="input100" type="text" value="<?php echo $row['b_name']; ?>" name="b_name" placeholder="Enter Book Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-book" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Author Name is required">
						<input class="input100" type="text" value="<?php echo $row['b_author']; ?>" name="b_author" placeholder="Enter Author's Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-edit" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Publication's name is required">
						<input class="input100" type="text" name="b_pub" value="<?php echo $row['b_pub']; ?>" placeholder="Enter Publication's Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-building" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Quantity is required">
						<input class="input100" type="number" name="b_quant" value="<?php echo $row['b_quant']; ?>" placeholder="Enter Quantity">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-list-ol" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="number" name="b_id" disabled value="<?php echo $row['b_id']; ?>" placeholder="Enter Book ID">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-id-card-o" aria-hidden="true"></i>
					</span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="regitser">
							Confirm
						</button>
					</div>
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