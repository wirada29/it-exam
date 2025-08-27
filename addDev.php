
<?php
include "connect.php";

$dev_name = $_POST['dev_name'];
$price = $_POST['price'];
$amount = $_POST['amount'];
$location = $_POST['location'];

$sql = "INSERT INTO device (dev_name,price,amount,location)
        VALUES ('$dev_name','$price','$amount','$location')";
$result = mysqli_query($con,$sql);

if($result){
   header("Location: showDev.php"); 
   exit();
}else{
   echo "เกิดข้อผิดพลาด: " . mysqli_error($con);
}
?>
