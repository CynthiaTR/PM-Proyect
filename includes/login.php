<?php

require 'dbh.php';
$nameMail = $_POST['IDUsUser'];
$password = $_POST['IDUsContra'];


$sql = "SELECT * FROM usuario WHERE nombre =? OR contraseña=?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../index.php?error=sqlerror1");
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "ss", $nameMail, $nameMail);
    mysqli_stmt_execute($stmt);

    $resultCheck = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultCheck)) {
        session_start();
        $_SESSION['id'] = $row['ID'];
        $_SESSION['nombre'] = $row['NOMBRE'];
        $_SESSION['correo'] = $row['CORREO'];
        header("Location: ../index.php?success");
        exit();
    } else {
        header("Location: ../index.php?error=sqlerror2");
        exit();
    }
}
