<?php
	include 'connection.php';
    if (isset($_POST['register'])) {
    $s_name=$_POST['s_name'];
    $s_mail=$_POST['s_mail'];
    $s_phone=$_POST['s_phone'];
    $s_gender=$_POST['s_gender'];
    $s_branch=$_POST['s_branch'];
    $s_sem=$_POST['s_sem'];
    $s_roll=$_POST['s_roll'];
    $image = $_FILES['b_img']['tmp_name']; 
    $s_img = addslashes(file_get_contents($image));
    
	$query="insert into student(s_name,s_mail,s_phone,s_gender,s_branch,s_sem,s_roll,s_img) values('$s_name','$s_mail','$s_phone','$s_gender','$s_branch','$s_sem','$s_roll','$s_img')";
	$res=mysqli_query($conn, $query);
	$message="";
	
    if($res){
        $message="Student Added Successfully";
        header("Location:c_stud.php?id= '$s_roll';& message=$message");
	}else{
        echo '<script>alert("Student already Exists")</script>';
        echo "<script> location.href='student.html'; </script>";
	}
}
?>