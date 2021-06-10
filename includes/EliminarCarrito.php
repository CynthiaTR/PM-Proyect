<?php

require 'dbh.php';
$ID_Usuario =   $_POST['IdUser'];
$ID_Articulo = $_POST['IDArticulo'];


$sql = "CALL SP_EliminardeCarrito('" . $ID_Usuario . "','" . $ID_Articulo . "')";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo json_encode(array('success' => 0));
    exit();
} else {
    mysqli_stmt_execute($stmt);
    echo json_encode(array('success' => 1));
}
mysqli_stmt_close($stmt);
