<?php
require_once 'ctrl\conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']); 
    $password = htmlspecialchars($_POST['passwd']); 

    if (mysqli_connect_errno()) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM akun WHERE username = ? AND passwd = ?";
    $stmt = mysqli_prepare($con, $sql);

    mysqli_stmt_bind_param($stmt, 'ss', $username, $password);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }

    if (mysqli_num_rows($result) == 0) {
        if (strlen($username) > 12 || strlen($password) > 12) {
            header('');
            echo "<script>alert('Password atau Username terlalu banyak mohon inputkan lagi');</script>";
        } else {
            header('');
            echo "<script>alert('Password atau Username salah');</script>";
        }
    } else if (mysqli_num_rows($result) == 1){
        header('dashboard');
        exit();
    }
}
?>
