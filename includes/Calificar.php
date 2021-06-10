<?php

require 'dbh.php';
$IDCaja = $_POST['IDCaja'];
$Calificacion = $_POST['Calificacion'];
$IDUser = $_POST['IDUser'];



if (empty($IDCaja) || empty($Calificacion) || empty($IDUser)) {
    header("Location: ../index.php?error=emptyfields");
} else {
    $sql = "CALL SP_GuardarCali('" . $IDCaja . "','" . $Calificacion . "','" . $IDUser . "')";
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
