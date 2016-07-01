<?php

$zzz=fopen("files.txt", "r");
$a=fread($zzz, 32);
$a=$a+1;
fclose($zzz);

$zzz=fopen("files.txt", "w");
fwrite($zzz, $a);
fclose($zzz);

mkdir($a);
chdir($a);

$target_file = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$uploadOK=1;

if(isset($_POST["submit"])) {
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	if($check == false) {
		$uploadOK=0;
	}
}
if (file_exists($target_file)) {
	$uploadOK=0;
}
if ($_FILES["fileToUpload"]["size"] > 5000000) {
	$uploadOK=0;
}
if ($imageFileType != "jpg" && $imageFileType != "svg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif" && $imageFileType != "bmp"){
	$uploadOK=0;
} 
if ($uploadOK==1){
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo "Succesful <br />";
		$zzy="http://0000imagehost.tk/";
		$yyy="http://60.240.241.10/";
		$zzx=$a;
		$zzw="/";
		$zzv=$target_file;
		$zzu="Uploaded file is here: ";
		$yyu="If that didn't work, try: ";
		
		echo $zzu . $zzy . $zzx . $zzw . $zzv;
		echo "<br />";
		echo $yyu . $yyy . $zzx . $zzw . $zzv;
	} else {
		echo "Un-successful";
	}
} else {
	chdir("..");
	echo 'File is not acceptable. Read image guidelines <a href="guidelines.html">here</a>';
}

?>
