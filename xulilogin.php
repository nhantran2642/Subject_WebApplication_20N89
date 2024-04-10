<?php
@include 'connect_db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $select = " SELECT * FROM admin WHERE username = '$username' && password = '$password' ";
    $result = mysqli_query($conn, $select);

    // if (mysqli_num_rows($result) > 0) {
    //     header("Location: admin_page.php");
    //     exit;
    // } else {
    //     $error[] = 'Username hoặc Password không đúng!';
    // }
    if (mysqli_num_rows($result) > 0) {
        echo 'success';
        exit;
    } else {
        echo 'Username hoặc Password không đúng!';
    }
}
