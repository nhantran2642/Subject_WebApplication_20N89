<?php
@include('connect_db.php');
if (isset($_REQUEST['IDPB'])) {
    $IDPB = $_REQUEST['IDPB'];
    $sql = "SELECT * FROM phongban WHERE IDPB='$IDPB'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $tenpb = $row['Tenpb'];
        $mota = $row['Mota'];
    } else {
        echo "Không có kết quả";
    }
} else {
    echo "Không có IDPB được truyền";
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $tenpb_update = $_POST['textbox-tenpb'];
        $mota_update = $_POST['text-area'];

        $sql_update = "UPDATE phongban SET Tenpb='$tenpb_update', Mota='$mota_update' WHERE IDPB='$IDPB'";
        if (mysqli_query($conn, $sql_update)) {
            header('Location: capnhappb.php');
            exit();
        };
    } elseif (isset($_POST['reset'])) {
        $tenpb = $row['TenPB'];
        $mota = $row['MoTa'];
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
            <h1>Cập nhập thông tin phòng ban <?php echo isset($IDPB) ? $IDPB : ''; ?></h1>
            <input type="text" id="tbx" name="textbox-idpb" placeholder="IDPB" readonly value="<?php echo isset($IDPB) ? $IDPB : ''; ?>" /><br />
            <input type="text" id="tbx" name="textbox-tenpb" placeholder="Tên Phòng ban" value="<?php echo isset($tenpb) ? $tenpb : ''; ?>" /><br />
            <textarea name="text-area" id="tarea" cols="20" rows="3" placeholder="Mô tả"><?php echo isset($mota) ? $mota : ''; ?></textarea><br />
            <input type="submit" name="submit" value="Submit" class="btn" />
            <input type="reset" name="reset" value="Reset" class="btn" />
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
        window.location.href = 'capnhappb.php'
    }
</script>

</html>