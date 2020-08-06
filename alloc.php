<?php
	include 'connection.php';
    
    $b_id=$_POST['b_id'];
    $b_name=$_POST['b_name'];
    $s_name=$_POST['s_name'];
    $s_roll=$_POST['s_roll'];
    $b_date=$_POST['b_date'];
    $r_date=$_POST['r_date'];
    $message="";
    $sql_u = "select * FROM alloc WHERE s_roll='$s_roll' and b_id='$b_id'";
    $res_u=mysqli_query($conn, $sql_u);
    if (mysqli_num_rows($res_u) > 0){
        echo '<script>alert("Book Already Allocated")</script>';
        echo "<script> location.href='index.php'; </script>";
    } else{
    $query="insert into alloc(b_id,b_name,s_name,s_roll,b_date,r_date) values('$b_id','$b_name','$s_name','$s_roll','$b_date','$r_date')";
    $res=mysqli_query($conn, $query);
    
    if($res){
    $message="Book Allocated Successfully";
    $sql= "update book set b_quant = b_quant - 1 where b_id=".$_GET['id'];
    $res1 = mysqli_query($conn,$sql) or die( mysqli_error($conn));
    header("Location: stud_book.php?id= '$b_id';& message='$message';");
	}else{
		echo '<script>alert("Student Does Not Exists")</script>';
        echo "<script> location.href='index.php'; </script>";
    }
}


?>