<?php
include "connect.php";

if (!isset($_GET['id'])) {
    die("❌ ไม่พบ ID ที่ต้องการอัปเดต");
}

$id = intval($_GET['id']);
$name = $_POST['dev_name'];
$price = $_POST['price'];
$amount = $_POST['amount'];
$location = $_POST['location'];

$sql = "UPDATE `it-exam` 
        SET dev_name = ?, price = ?, amount = ?, location = ? 
        WHERE dev_id = ?";

$stmt = $con->prepare($sql);

if ($stmt) {
    // 'sdisi' หมายถึง: string, double, integer, string, integer
    $stmt->bind_param("sdisi", $name, $price, $amount, $location, $id);
    $result = $stmt->execute();

    if ($result) {
        echo "✅ แก้ไขข้อมูลเรียบร้อย <a href='showDev.php'>กลับไปหน้ารายการ</a>";
    } else {
        echo "❌ แก้ไขไม่สำเร็จ: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "❌ การเตรียมคำสั่งล้มเหลว: " . $con->error;
}
