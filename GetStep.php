<?php
include("Connect.php");


$dogID=isset($_GET['dogID']) ? $_GET['dogID'] : '';
$sql = "SELECT m_Step FROM Momentums WHERE dogID = '$dogID' ORDER BY m_Time DESC limit 1";

if ($result = mysqli_query($link,$sql))
{
	
	$rows = mysqli_fetch_array($result);
	$m_StepData = $rows[0];
	if($m_StepData)
	{
		echo "$m_StepData";
	}
	else
	{
		echo "0";
	}
}
else
{
	echo "SQL문 처리중 에러발생 : ";
}
?>
