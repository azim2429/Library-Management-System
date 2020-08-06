<?php
    require 'connection.php';
    $s_name=$_POST['s_name'];
    $s_mail=$_POST['s_mail'];
    $s_phone=$_POST['s_phone'];
    $s_gender=$_POST['s_gender'];
    $s_branch=$_POST['s_branch'];
    $s_sem=$_POST['s_sem'];
    $s_roll=$_POST['s_roll'];
    $query="update student set s_name = '$s_name',s_mail='$s_mail',s_phone='$s_phone',s_gender='$s_gender',s_branch='$s_branch',s_sem='$s_sem' where s_roll=".$_GET['id'];
	
    
	$res=mysqli_query($conn, $query) ;
    $message="";
    if($res){
        $message="Student Updated Successfully";
        header("Location:v_stud.php?id='$s_roll';& message=$message");
	}else{
        echo '<script>alert("Roll Number Already Exists")</script>';
        echo "<script> location.href='v_stud.php';</script>";
	}
    ?>