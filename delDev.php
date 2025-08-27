<?php 
 include "connect.php"; 

 $dev_id = $_GET['dev_id']; 
 $sql = "DELETE FROM device WHERE dev_id='$dev_id'"; 
 $result = mysqli_query($con,$sql); 

 if($result){ 
   header("Location: showDev.php"); // ✅ กลับไปหน้าหลักทันที
   exit();
 }else{ 
   echo "เกิดข้อผิดพลาด: " . mysqli_error($con); 
 } 
?>