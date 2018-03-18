<?php
require '../sql_connect.php';

$sql = "SELECT *
FROM raw_materials rm
JOIN supplier s
ON rm.supp_Id = s.supp_Id
WHERE rm_Id = '{$_POST['rm']}'
LIMIT 1";

$result = mysqli_query($conn, $sql);

$pack = array();

while($item = mysqli_fetch_assoc($result)){
	//take each row array and store as single element
	$pack[] = $item;
}
echo json_encode($pack);
?>