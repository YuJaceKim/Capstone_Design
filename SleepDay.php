<?php
include("Connect.php");

$dogID=isset($_GET['dogID']) ? $_GET['dogID'] : '';
// 오늘~6일 전까지의 Step총합을 가져온다.
$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, startTime, endTime)), date_format(curdate(), '%Y.%m.%d') FROM Sleeps WHERE startTime > date_format(curdate(), '%Y-%m-%d %H:%i:%s') and dogID = '$dogID'";
dayOutput($link, $sql);
$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, startTime, endTime)), date_format(curdate()-INTERVAL 1 DAY, '%Y.%m.%d') FROM Sleeps WHERE startTime < curdate( ) and startTime > (CURDATE() - INTERVAL 1 DAY) and dogID = '$dogID'";
dayOutput($link, $sql);
$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, startTime, endTime)), date_format(curdate()-INTERVAL 2 DAY, '%Y.%m.%d') FROM Sleeps WHERE startTime < (curdate( ) - INTERVAL 1 DAY) and startTime > (CURDATE() - INTERVAL 2 DAY) and dogID = '$dogID'";
dayOutput($link, $sql);
$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, startTime, endTime)), date_format(curdate()-INTERVAL 3 DAY, '%Y.%m.%d') FROM Sleeps WHERE startTime < (curdate( ) - INTERVAL 2 DAY) and startTime > (CURDATE() - INTERVAL 3 DAY) and dogID = '$dogID'";
dayOutput($link, $sql);
$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, startTime, endTime)), date_format(curdate()-INTERVAL 4 DAY, '%Y.%m.%d') FROM Sleeps WHERE startTime < (curdate( ) - INTERVAL 3 DAY) and startTime > (CURDATE() - INTERVAL 4 DAY) and dogID = '$dogID'";
dayOutput($link, $sql);
$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, startTime, endTime)), date_format(curdate()-INTERVAL 5 DAY, '%Y.%m.%d') FROM Sleeps WHERE startTime < (curdate( ) - INTERVAL 4 DAY) and startTime > (CURDATE() - INTERVAL 5 DAY) and dogID = '$dogID'";
dayOutput($link, $sql);
$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, startTime, endTime)), date_format(curdate()-INTERVAL 6 DAY, '%Y.%m.%d') FROM Sleeps WHERE startTime < (curdate( ) - INTERVAL 5 DAY) and startTime > (CURDATE() - INTERVAL 6 DAY) and dogID = '$dogID'";
dayOutput($link, $sql);


function dayOutput($link, $sql){
	if ($result = mysqli_query($link,$sql))
	{
	    $rows = mysqli_fetch_array($result);
    	$SleepData = $rows[0];
		$DayData = $rows[1];
    	if($SleepData)
	    {
	        echo "$SleepData";
	        echo "\t";
	    }else{
			echo "0";
			echo "\t";
		}
		if($DayData)
		{
			echo "$DayData";
			echo "\t";
		}

	}
	else
	{
	    echo "SQL문 처리중 에러발생 : ";
	}

}

?>
