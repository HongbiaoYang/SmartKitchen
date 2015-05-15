<?php 
require_once 'library/config.php';
$id = (int)$_GET['id'];
$dbConn = mysqli_connect ($dbHost, $dbUser, $dbPass, $dbName) or die ('MySQL con
nect failed. ' . mysqli_error());

#mysql_select_db("db_myasset");

$psql = "Select tbl_hardwares.id as pid, qnty, unit, vname, price 
		From tbl_hardwares, tbl_vendors
		Where tbl_hardwares.vid = tbl_vendors.id and cid=$id";


$result = mysqli_query($dbConn, $psql);
$data = "<select name=\"prodid\" id=\"prodid\">";
$resultType = MYSQL_NUM;
while($row = mysqli_fetch_assoc($result)){
	extract($row);
	$data .= "<option value=\"$pid\">".$vname.", (".$qnty." ".$unit.",".$price."$)</option>";
}
$data .="</select>";
mysqli_close($dbConn);
echo $data;

?>
