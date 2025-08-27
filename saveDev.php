<?php 
 include "connect.php"; 

 $dev_id = $_POST['dev_id'];
 $dev_name = $_POST['dev_name'];
 $price = $_POST['price'];
 $amount = $_POST['amount'];
 $location = $_POST['location'];

 $sql = "UPDATE device SET 
         dev_name='$dev_name',
         price='$price',
         amount='$amount',
         location='$location'
         WHERE dev_id='$dev_id'";

 $result = mysqli_query($con,$sql);

 if($result){
   header("Location: showDev.php"); // ✅ กลับไปหน้าหลักทันที
   exit();
 }else{
   echo "เกิดข้อผิดพลาด: " . mysqli_error($con);
 }
?>