<?php 
require_once 'library/config.php';
$id = (int)$_GET['id'];

$dbConn = mysqli_connect ($dbHost, $dbUser, $dbPass, $dbName) or die ('MySQL connect failed. ' . mysqli_error());

$csql = "Select vname, tbl_pairs.vid as id from tbl_vendors, tbl_pairs
		Where tbl_pairs.vid = tbl_vendors.id and tbl_pairs.cid=$id";


$result = mysqli_query($dbConn, $csql);
$data = "<select name=\"txtVname\">";
while($row = mysqli_fetch_assoc($result)){
	extract($row);
	$data .= "<option value=\"$id\">".$vname."</option>";
}
$data .="</select>";
mysqli_close($dbConn);
echo $data;

?>
