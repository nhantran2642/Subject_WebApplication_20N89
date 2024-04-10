<?php
@include('connect_db.php');
// if (isset($_REQUEST['IDNV'])) {
//     $IDNV = $_REQUEST['IDNV'];
//     $sql = "SELECT * FROM nhanvien WHERE IDNV='$IDNV'";
//     $result = mysqli_query($conn, $sql);

//     if (mysqli_num_rows($result) > 0) {
//         $row = mysqli_fetch_assoc($result);
//         $hoten = $row['Hoten'];
//         $IDPB = $row['IDPB'];
//         $diachi = $row['Diachi'];
//     } else {
//         echo "Không có kết quả";
//     }
// } else {
//     echo "Không có IDNV được truyền";
// }



// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     if (isset($_POST['submit'])) {
//         $IDNV_add = $_POST['textbox-idnv'];
//         $hoten_add = $_POST['textbox-hoten'];
//         $IDPB_add = $_POST['textbox-idpb'];
//         $diachi_add = $_POST['textbox-diachi'];

//         $sql_insert = "INSERT INTO nhanvien(IDNV, Hoten, IDPB, Diachi) VALUES ('$IDNV_add', '$hoten_add', '$IDPB_add', '$diachi_add')";
//         $result = mysqli_query($conn, $sql_insert);
//         if (mysqli_num_rows($result) > 0) {
//             header('Location: xemthongtinnv.php');
//             exit();
//         };
//     } elseif (isset($_POST['reset'])) {

//         //xu li reset
//     }
// }

// Lấy IDNV lớn nhất từ cơ sở dữ liệu
$sql_max_id = "SELECT MAX(CAST(SUBSTRING(IDNV, 3) AS UNSIGNED)) AS max_id FROM nhanvien";
$result_max_id = mysqli_query($conn, $sql_max_id);
$row_max_id = mysqli_fetch_assoc($result_max_id);
$max_id = $row_max_id['max_id'];

// Tăng giá trị IDNV lớn nhất lên một
$new_id = $max_id + 1;
$new_id_formatted = sprintf("NV%02d", $new_id); // Định dạng lại IDNV

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $IDNV_add = $new_id_formatted;
        $hoten_add = $_POST['textbox-hoten'];
        $IDPB_add = $_POST['textbox-idpb'];
        $diachi_add = $_POST['textbox-diachi'];

        $sql_insert = "INSERT INTO nhanvien(IDNV, Hoten, IDPB, Diachi) VALUES ('$IDNV_add', '$hoten_add', '$IDPB_add', '$diachi_add')";
        $result = mysqli_query($conn, $sql_insert);
        if ($result) {
            header('Location: xemthongtinnv.php');
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Itim|Lobster|Montserrat:500|Noto+Serif|Paficico|Nunito|Patrick+Hand|Roboto+Mono:100,100i,300,300i,400,400i,500,500i,700,700i|Roboto+Slab|Saira|Protest+Revolution" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <h1>Thêm mới một nhân viên</h1>
            <input type="text" id="tbx" name="textbox-idnv" readonly placeholder="IDNV" value="<?php echo $new_id_formatted; ?>" /><br />
            <input type="text" id="tbx" name="textbox-hoten" required placeholder="Họ và tên" /><br />
            <input type="text" id="tbx" name="textbox-idpb" required placeholder="IDPB" /><br />
            <input type="text" id="tbx" name="textbox-diachi" required placeholder="Địa chỉ" /><br />
            <input type="submit" name="submit" value="Submit" class="btn" />
            <input type="reset" name="reset" value="Reset" class="btn" onclick="clearInfo()" />
            <input type="button" name="back" value="Back" class="btn" onclick="goBack()" />
        </form>
    </div>
</body>
<style>
    input[type="text"],
    select {
        margin: 9px 0;
        display: inline-block;
        border: 1px solid #000000;
        border-radius: 3px;
    }

    #tbx {
        width: 100%;
        padding: 10px 15px;
        font-size: 17px;
        margin: 8px 0;
        background: #fff;
        border-radius: 5px;
    }

    #tarea {
        width: 100%;
        padding: 10px 15px;
        font-size: 17px;
        margin: 8px 0;
        background: #fff;
        border-radius: 5px;
    }


    .btn {
        background: #fbd0d9;
        color: black;
        text-transform: capitalize;
        font-size: 20px;
        cursor: pointer;
        border-radius: 5px;
    }

    form {
        height: 100px;
    }

    textarea {
        border: 1px solid #000000;
        border-radius: 3px;
        /* position: relative; */
    }

    body {
        font-family: "Saira", sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50vh;
        margin: 0;
        background-color: #feeceb;
    }

    h1 {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 0px;
    }

    #container {
        text-align: center;
    }
</style>
<script>
    function goBack() {
        window.location.href = 'admin_page.php'
    }

    function clearInfo() {
        document.getElementById('textbox-hoten').value = '';
        document.getElementById('textbox-idpb').value = '';
        document.getElementById('textbox-diachi').value = '';

    }
</script>

</html>