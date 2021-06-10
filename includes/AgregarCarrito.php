<?php

require 'dbh.php';
$ID_Usuario =   $_POST['IdUser'];
$ID_Articulo = $_POST['IDArticulo'];
$Cantidad = $_POST['Cantidad'];


$sql = "CALL SP_AgregarCarrito('" . $ID_Usuario . "','" . $ID_Articulo . "','" . $Cantidad . "')";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo json_encode(array('success' => 0));
    exit();
} else {
    mysqli_stmt_execute($stmt);
    echo json_encode(array('success' => 1));
}
mysqli_stmt_close($stmt);
