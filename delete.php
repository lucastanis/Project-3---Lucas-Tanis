<?php
include "db_conn_product.php";
$id = $_GET["id"];
$sql = "DELETE FROM `crud` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: productpagina.php?msg=Verwijderen product gelukt!");
} else {
  echo "Failed: " . mysqli_error($conn);
}
