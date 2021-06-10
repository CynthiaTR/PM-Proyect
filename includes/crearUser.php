<?php

require 'dbh.php';
$username = $_POST['IDUsuario'];
$email = $_POST['IDContra'];
$password = $_POST['IDCorreo'];



if (empty($username) || empty($email) || empty($password)) {
    header("Location: ../index.php?error=emptyfields");
} else {
    $sql = "CALL SP_AgregarUser('" . $username . "','" . $email . "','" . $password . "')";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_execute($stmt);
        header("Location: ../index.php?saliobien=true");
    }
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($conn);
}
