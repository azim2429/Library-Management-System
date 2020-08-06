    <?php
    require 'connection.php';
    $b_name=$_POST['b_name'];
    $b_author=$_POST['b_author'];
    $b_pub=$_POST['b_pub'];
    $b_quant=$_POST['b_quant'];
    
    $query="update book set b_name = '$b_name',b_author = '$b_author' , b_pub='$b_pub' , b_quant='$b_quant' where b_id=".$_GET['id'];
	
    
	$res=mysqli_query($conn, $query) or die( mysqli_error($conn));
    $message="";
    if($res){
        $message="Book Updated Successfully";
        header("Location:v_book.php?id='$b_id';& message=$message");
	}else{
        echo '<script>alert("Cannot Be updated")</script>';
        echo "<script> location.href='v_book.php'; </script>";
	}
    
    ?>