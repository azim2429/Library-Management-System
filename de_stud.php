<?php
    require 'connection.php';
    $query="delete from student where s_roll=".$_GET['id'];
	
    
	$res=mysqli_query($conn, $query);
    $message="";
    if($res){
        $message="Student Deleted Successfully";
        echo "<script> location.href='v_stud.php'; </script>";
	}else{
        $message="Book Already Deleted";
		echo '<script>alert("Student has borrowed book")</script>';
        echo "<script> location.href='v_stud.php'; </script>";
	}

    ?>