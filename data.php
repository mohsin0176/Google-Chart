<?php

include "database.php";

$stmt=$con->prepare("SELECT *FROM product");
$stmt->execute();
$results=$stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($results);

?>