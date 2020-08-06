<?php
    require 'connection.php';
    
    $query="delete from book where b_id=".$_GET['id'];
	
    
	$res=mysqli_query($conn, $query);
    $message="";
    if($res){
        $message="Book Deleted Successfully";
        echo "<script> location.href='v_book.php'; </script>";
	}else{
        $message="Book Already Deleted";
		echo '<script>alert("Book is Allocated To a Student")</script>';
        echo "<script> location.href='v_book.php'; </script>";
	}
    
    ?>