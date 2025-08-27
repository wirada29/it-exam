<?php
include "connect.php";
$sql = "SELECT * FROM device";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>ข้อมูลอุปกรณ์</title>
    <style>
        /* พื้นหลังหน้าเว็บ */
        body {
            background: #fef6ff;
            color: #444;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px 0;
            margin: 0;
        }

        /* กล่องตาราง */
        .table-container {
            background: #fff0f5;
            border-radius: 25px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 1100px;
            border: 2px solid #ffd5ec;
        }

        /* หัวข้อ */
        .table-title {
            background-color: #c084fc;
            color: #fff;
            padding: 12px 25px;
            border-radius: 15px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 25px;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
            display: block;
            box-shadow: 0 4px 10px rgba(192, 132, 252, 0.4);
        }

        /* ปุ่ม */
        .btn {
            cursor: pointer;
            padding: 10px 18px;
            font-weight: bold;
            border: none;
            border-radius: 15px;
            transition: all 0.3s ease-in-out;
            text-decoration: none;
            display: inline-block;
            color: #fff;
            font-size: 14px;
        }

        .btn-add {
            background: #6ee7b7;
            color: #000;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(110, 231, 183, 0.4);
        }

        .btn-add:hover {
            transform: scale(1.05);
            background: #4ade80;
        }

        /* ปุ่มแก้ไข */
        .btn-edit {
            background: #93c5fd;
            color: #000;
            box-shadow: 0 4px 8px rgba(147, 197, 253, 0.4);
        }

        .btn-edit:hover {
            background: #60a5fa;
            transform: scale(1.05);
        }

        /* ปุ่มลบ */
        .btn-delete {
            background: #fda4af;
            color: #000;
            box-shadow: 0 4px 8px rgba(253, 164, 175, 0.4);
        }

        .btn-delete:hover {
            background: #fb7185;
            transform: scale(1.05);
        }

        /* ตาราง */
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 15px;
            overflow: hidden;
        }

        thead {
            background: #fbcfe8;
            color: #6b21a8;
            font-size: 15px;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #f3d1e7;
        }

        tbody tr {
            background: #fff;
            transition: 0.3s;
        }

        tbody tr:hover {
            background: #ffe4f4;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .table-container {
                padding: 20px;
            }

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            thead tr {
                display: none;
            }

            tbody tr {
                margin-bottom: 15px;
                background: #ffe4f4;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                padding: 10px;
            }

            tbody td {
                text-align: right;
                padding-left: 50%;
                position: relative;
                border-bottom: none;
            }

            tbody td::before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                width: 45%;
                font-weight: bold;
                text-align: left;
                color: #6b21a8;
            }
        }
    </style>
</head>

<body>

    <div class="table-container">
        <div class="table-title">📋 จัดการข้อมูลอุปกรณ์</div>

        <a href="formDev.php" class="btn btn-add">➕ เพิ่มอุปกรณ์</a>

        <table>
            <thead>
                <tr>
                    <th>รหัสอุปกรณ์</th>
                    <th>ชื่ออุปกรณ์</th>
                    <th>ราคา (บาท)</th>
                    <th>จำนวน</th>
                    <th>สถานที่เก็บ</th>
                    <th>การจัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td data-label="รหัสอุปกรณ์"><?php echo $row['dev_id']; ?></td>
                        <td data-label="ชื่ออุปกรณ์"><?php echo $row['dev_name']; ?></td>
                        <td data-label="ราคา"><?php echo number_format($row['price']); ?></td>
                        <td data-label="จำนวน"><?php echo $row['amount']; ?></td>
                        <td data-label="สถานที่เก็บ"><?php echo $row['location']; ?></td>
                        <td data-label="การจัดการ">
                            <a href="editDev.php?dev_id=<?php echo $row['dev_id']; ?>" class="btn btn-edit">✏️ Edit</a>
                            <a href="delDev.php?dev_id=<?php echo $row['dev_id']; ?>" class="btn btn-delete"
                                onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่?')">🗑 Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>