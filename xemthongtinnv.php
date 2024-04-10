<?php
@include('connect_db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 2px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #d5bdaf;
        }

        a {
            align-self: center;
        }

        body {
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 30px;
            font-size: 15px;
            background: #585858;
            color: #fff;
            margin: 0 5px;
            text-transform: capitalize;
            border-radius: 10px;
        }

        .btn:hover {
            background: green;
        }
    </style>
</head>

<body>
    <h2>Danh sách nhân viên</h2>
    <table>
        <tr>
            <th>IDNV</th>
            <th>Họ và tên</th>
            <th>IDPB</th>
            <th>Địa chỉ</th>
        </tr>
        <?php
        $sql = "SELECT * FROM nhanvien";
        $result =  mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["IDNV"] . "</td><td>" . $row["Hoten"] . "</td><td>" . $row["IDPB"] . "</td><td>" . $row["Diachi"] . "</td></tr>";
            }
        } else {
            echo "0 kết quả";
        }
        mysqli_close($conn);
        ?>
    </table><br>
    <a href="admin_page.php" class="btn">Back</a>
</body>

</html>