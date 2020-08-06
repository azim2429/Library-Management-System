<?php
	include 'connection.php';
    if(isset($_POST["register"])){ 
    $b_name=$_POST['b_name'];
    $b_author=$_POST['b_author'];
    $b_pub=$_POST['b_pub'];
    $b_quant=$_POST['b_quant'];
    $b_id=$_POST['b_id'];
    $image = $_FILES['b_img']['tmp_name']; 
    $b_img = addslashes(file_get_contents($image));
    $query="insert into book(b_name,b_author,b_pub,b_quant,b_id,b_img) values('$b_name','$b_author','$b_pub','$b_quant','$b_id','$b_img')";
	$res=mysqli_query($conn, $query) or die( mysqli_error($conn));
    $message="";
    if($res){
        $message="Book Added Successfully";
        header("Location:c_book.php?id= '$b_id';& message=$message");
	}else{
        echo '<script>alert("Book Id already Present")</script>';
        echo "<script> location.href='book.html'; </script>";
	}
}

?>