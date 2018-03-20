<?php
require '../sql_connect.php';

$sql = "SELECT *
FROM supplier supp
WHERE supp_Id = '{$_POST['supplier']}'
LIMIT 1";

$result = mysqli_query($conn, $sql);

$pack = array();

while($item = mysqli_fetch_assoc($result)){
	//take each row array and store as single element
	$pack[] = $item;
}
echo json_encode($pack);
?>