<?
include $_SERVER['DOCUMENT_ROOT'] . "/inc/init.php";
include $_SERVER['DOCUMENT_ROOT'] . "/inc/Repos/UserRepo.php";
$Parameters = "";
$Values = "";
$UpdateData = "";

$updateKey = "id";
$updatecriteria = "";
$userid = "usuario_id";
$company = "company_id";
$table = "producto";
$UploadsDir = $_SERVER['DOCUMENT_ROOT'] . "/archivos/";
$isUpdate = false;
$FilesUploaded = "";


foreach($_FILES as $Index=>$File) {
	$FileName = $UploadsDir . md5($File["size"] . $File["name"]).".jpg";
	if(move_uploaded_file($File["tmp_name"], $FileName)) {
		$FilesUploaded .= md5($File["size"] . $File["name"]).".jpg" .",";
	}
}

	$Parameters .=  "`fotos`,";
	$Values .= "'".$FilesUploaded."',";

foreach ($_POST as $Variable=>$Value) {
if($Value != "" && $Value != " " && $Variable != $updateKey) {
$Parameters .=  "`".$Variable."`,";
if ($Value == "on") {
	$Values .= "'1',";
} else {
	$Values .= "'".$Value."',";
}
$UpdateData .= "`".$Variable."`"."="."'".$Value."',";
} 
if ($Variable == $updateKey && $Value != "") {
$isUpdate=true;
$updatecriteria = $Value;
}
if ($Variable == $userid) {
$Parameters .=  "`".$Variable."`,";
$Values .= "'".$UserData["id"]."',";
}
}
$UpdateData = rtrim($UpdateData, ",");
$Values = rtrim($Values, ",");
$Parameters = rtrim($Parameters, ",");

if ($isUpdate) {
	echo $pdo->exec('UPDATE `'.$table.'` SET '.$UpdateData.' WHERE '.$updateKey.' = "'.$updatecriteria.'"');
} else {
    echo $pdo->exec('INSERT INTO `'.$table.'`('.$Parameters.') VALUES ('.$Values.')');
}

echo 'INSERT INTO `'.$table.'`('.$Parameters.') VALUES ('.$Values.')';
?>