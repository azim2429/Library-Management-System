<?php
    require 'connection.php';
    $b_id=$_POST['b_id'];
    $b_name=$_POST['b_name'];
    $s_name=$_POST['s_name'];
    $s_roll=$_POST['s_roll'];
    $b_date=$_POST['b_date'];
    $r_date=$_POST['r_date'];
    
    $query="delete from alloc where b_id=".$_GET['id'];
	
    
	$res=mysqli_query($conn, $query) or die( mysqli_error($conn));
    $message="";
    if($res){
        $message="Book Returned Successfully";
        $sql= "update book set b_quant = b_quant + 1 where b_id=".$_GET['id'];
    $res1 = mysqli_query($conn,$sql) or die( mysqli_error($conn));
	}else{
		$message="Book Already Returned";
	}
    header("Location: v_book.php?message=$message");
    ?>