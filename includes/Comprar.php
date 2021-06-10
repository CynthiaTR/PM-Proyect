<?php

require 'dbh.php';
$ID_Usuario =   $_POST['IdUser'];


$sql = "CALL SP_Comprar('" . $ID_Usuario . "')";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo json_encode(array('success' => 0));
    exit();
} else {
    mysqli_stmt_execute($stmt);
    echo json_encode(array('success' => 1));
}
mysqli_stmt_close($stmt);
