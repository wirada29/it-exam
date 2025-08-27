<?php include "connect.php"; ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>เพิ่มอุปกรณ์</title>
    <style>
        body {
            background: #fdf2f8;
            color: #4b5563;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding-top: 50px;
            margin: 0;
        }

        /* กล่องฟอร์ม */
        .form-container {
            background: #fce7f3;
            padding: 30px;
            border-radius: 25px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
            border: 2px solid #f9a8d4;
        }

        /* หัวข้อ */
        h3 {
            text-align: center;
            margin-bottom: 25px;
            color: #9d174d;
            font-size: 22px;
            background-color: #f9a8d4;
            padding: 12px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(249, 168, 212, 0.3);
        }

        /* ป้ายชื่อฟิลด์ */
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #7e22ce;
        }

        /* ช่องกรอก */
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border-radius: 12px;
            border: 1px solid #fbcfe8;
            background: #fff0f6;
            color: #4b5563;
            font-size: 15px;
            transition: 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: #e879f9;
            box-shadow: 0 0 8px rgba(232, 121, 249, 0.5);
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
            margin: 5px;
            font-size: 14px;
        }

        /* ปุ่มบันทึก */
        .btn-save {
            background: #c4b5fd;
            color: #000;
            box-shadow: 0 4px 10px rgba(196, 181, 253, 0.4);
        }

        .btn-save:hover {
            transform: scale(1.05);
            background: #a78bfa;
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
        <h3>➕ เพิ่มข้อมูลอุปกรณ์</h3>

        <form action="addDev.php" method="post">
            <label>ชื่ออุปกรณ์</label>
            <input type="text" name="dev_name" required>

            <label>ราคา (บาท)</label>
            <input type="number" name="price" required>

            <label>จำนวน</label>
            <input type="number" name="amount" required>

            <label>สถานที่เก็บ</label>
            <input type="text" name="location" required>

            <div style="text-align:center;">
                <button type="submit" class="btn btn-save">💾 บันทึก</button>
                <a href="showDev.php" class="btn btn-back">↩ กลับ</a>
            </div>
        </form>
    </div>

</body>

</html>