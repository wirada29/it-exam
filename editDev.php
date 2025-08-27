<?php
include "connect.php";
$dev_id = $_GET['dev_id'];
$sql = "SELECT * FROM device WHERE dev_id='$dev_id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>แก้ไขอุปกรณ์</title>
    <style>
        body {
            background: #fef6ff;
            color: #444;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding-top: 50px;
        }

        /* กล่องฟอร์ม */
        .form-container {
            background: #e0f2fe;
            padding: 30px;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
            border: 2px solid #bae6fd;
        }

        h3 {
            text-align: center;
            margin-bottom: 25px;
            color: #3b0764;
            font-size: 22px;
            background-color: #c084fc;
            padding: 12px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(192, 132, 252, 0.3);
        }

        /* ป้ายชื่อ */
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #4b5563;
        }

        /* ช่องกรอกข้อมูล */
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border-radius: 12px;
            border: 1px solid #d1d5db;
            background: #fff;
            color: #111827;
            font-size: 15px;
            transition: 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: #a78bfa;
            box-shadow: 0 0 8px rgba(167, 139, 250, 0.5);
        }

        /* ปุ่ม */
        .btn {
            padding: 10px 20px;
            font-weight: bold;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            text-decoration: none;
            display: inline-block;
            color: #fff;
            margin: 5px;
            font-size: 14px;
        }

        /* ปุ่มบันทึก */
        .btn-save {
            background: #93c5fd;
            color: #000;
            box-shadow: 0 4px 10px rgba(147, 197, 253, 0.4);
        }

        .btn-save:hover {
            transform: scale(1.05);
            background: #60a5fa;
        }

        /* ปุ่มกลับ */
        .btn-back {
            background: #fda4af;
            color: #000;
            box-shadow: 0 4px 10px rgba(253, 164, 175, 0.4);
        }

        .btn-back:hover {
            transform: scale(1.05);
            background: #fb7185;
        }

        /* Responsive */
        @media (max-width: 500px) {
            .form-container {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h3>✏️ แก้ไขข้อมูลอุปกรณ์</h3>

        <form action="saveDev.php" method="post">
            <input type="hidden" name="dev_id" value="<?php echo $row['dev_id']; ?>">

            <label>ชื่ออุปกรณ์</label>
            <input type="text" name="dev_name" value="<?php echo $row['dev_name']; ?>" required>

            <label>ราคา (บาท)</label>
            <input type="number" name="price" value="<?php echo $row['price']; ?>" required>

            <label>จำนวน</label>
            <input type="number" name="amount" value="<?php echo $row['amount']; ?>" required>

            <label>สถานที่เก็บ</label>
            <input type="text" name="location" value="<?php echo $row['location']; ?>" required>

            <div style="text-align:center;">
                <button type="submit" class="btn btn-save">💾 บันทึกการแก้ไข</button>
                <a href="showDev.php" class="btn btn-back">↩ กลับ</a>
            </div>
        </form>
    </div>

</body>

</html>