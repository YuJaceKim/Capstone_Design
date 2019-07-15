<?php
include("Connect.php");

//$ID='Jiyun';
//$PASSWORD='babo';
$userID=isset($_GET['userID']) ? $_GET['userID'] : '';
//$PASSWORD=isset($_POST['PASSWORD']) ? $_POST['PASSWORD'] : '';
$sql = "SELECT nickName, phoneNumber, userMail FROM Users WHERE userID = '$userID'";
// userID에 해당하는 userID와 nickName을가져온다.
if ($result = mysqli_query($link,$sql))
{
	
	$rows = mysqli_fetch_array($result);
	$phoneNumberdata = $rows[0];
	$userIDdata = $rows[1];
	$userMaildata = $rows[2];
	if($userIDdata)
        {
                echo "$userIDdata";
        }
	echo "\t";
	if($phoneNumberdata)
	{
		echo "$phoneNumberdata";
	}
	echo "\t";
		if($userMaildata)
	{
		echo "$userMaildata";
	}
}
else
{
	echo "SQL문 처리중 에러발생 : ";
}
?>
