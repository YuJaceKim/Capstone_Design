<?php
include("Connect.php");

$dogID=isset($_GET['dogID']) ? $_GET['dogID'] : '';
// 오늘~6일 전까지의 Step총합을 가져온다.
$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, startTime, endTime)), date_format(now()-INTERVAL 7 DAY, '%Y.%m.%d') FROM Sleeps WHERE startTime > now() - interval 7 DAY and startTime < now() and dogID = '$dogID'";
dayOutput($link, $sql);
$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, startTime, endTime)), date_format(now()-INTERVAL 14 DAY, '%Y.%m.%d') FROM Sleeps WHERE startTime > now() - interval 14 DAY and startTime < now()-INTERVAL 7 DAY and dogID = '$dogID'";
dayOutput($link, $sql);
$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, startTime, endTime)), date_format(now()-INTERVAL 21 DAY, '%Y.%m.%d') FROM Sleeps WHERE startTime > now() - interval 21 DAY and startTime < now()-INTERVAL 14 DAY and dogID = '$dogID'";
dayOutput($link, $sql);
$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, startTime, endTime)), date_format(now()-INTERVAL 28 DAY, '%Y.%m.%d') FROM Sleeps WHERE startTime > now() - interval 28 DAY and startTime < now()-INTERVAL 21 DAY and dogID = '$dogID'";
dayOutput($link, $sql);
$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, startTime, endTime)), date_format(now()-INTERVAL 35 DAY, '%Y.%m.%d') FROM Sleeps WHERE startTime > now() - interval 35 DAY and startTime < now()-INTERVAL 28 DAY and dogID = '$dogID'";
dayOutput($link, $sql);
$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, startTime, endTime)), date_format(now()-INTERVAL 42 DAY, '%Y.%m.%d') FROM Sleeps WHERE startTime > now() - interval 42 DAY and startTime < now()-INTERVAL 35 DAY and dogID = '$dogID'";
dayOutput($link, $sql);
$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, startTime, endTime)), date_format(now()-INTERVAL 49 DAY, '%Y.%m.%d') FROM Sleeps WHERE startTime > now() - interval 49 DAY and startTime < now()-INTERVAL 42 DAY and dogID = '$dogID'";
dayOutput($link, $sql);


function dayOutput($link, $sql){
	if ($result = mysqli_query($link,$sql))
	{
	    $rows = mysqli_fetch_array($result);
    	$SleepData = $rows[0];
		$DayData = $rows[1];
    	if($SleepData)
	    {
	        echo floor("$SleepData");
	        echo "\t";
	    }
		else{
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
