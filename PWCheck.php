<?php
include("Connect.php");

//$userID='Jiyun';
//$passWord='babo';
$userID=isset($_POST['userID']) ? $_POST['userID'] : '';
$passWord=isset($_POST['passWord']) ? $_POST['passWord'] : '';
$sql = "SELECT * FROM Users WHERE userID = '$userID' AND passWord = '$passWord'";
if ($result = mysqli_query($link,$sql))
{
	
	$rows = mysqli_num_rows($result);
	if($rows != 0){
	    echo "Success";
	}

	else{
		echo "not correct password";
	}
}
else
{
	echo "SQL문 처리중 에러발생 : ";
}
?>
