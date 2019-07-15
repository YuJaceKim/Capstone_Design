<?php
include("Connect.php");

$dogID=isset($_GET['dogID']) ? $_GET['dogID'] : '';
// 오늘~6일 전까지의 Step총합을 가져온다.
$sql = "SELECT SUM(m_Step), date_format(curdate(), '%Y.%m.%d') FROM Momentums WHERE m_Time > date_format(curdate(), '%Y-%m-%d %H:%i:%s') and dogID = '$dogID'"; 
dayOutput($link, $sql);
$sql = "SELECT SUM(m_Step), date_format(curdate()-INTERVAL 1 DAY, '%Y.%m.%d') FROM Momentums WHERE m_Time < curdate( ) and m_Time > (CURDATE() - INTERVAL 1 DAY) and dogID = '$dogID'";
dayOutput($link, $sql);
$sql = "SELECT SUM(m_Step), date_format(curdate()-INTERVAL 2 DAY, '%Y.%m.%d' ) FROM Momentums WHERE m_Time < (curdate( )-INTERVAL 1 DAY) and m_Time > (CURDATE() - INTERVAL 2 DAY) and dogID = '$dogID'";
dayOutput($link, $sql);
$sql = "SELECT SUM(m_Step), date_format(curdate()-INTERVAL 3 DAY, '%Y.%m.%d') FROM Momentums WHERE m_Time < (curdate( )-INTERVAL 2 DAY) and m_Time > (CURDATE() - INTERVAL 3 DAY) and dogID = '$dogID'";
dayOutput($link, $sql);
$sql = "SELECT SUM(m_Step), date_format(curdate()-INTERVAL 4 DAY, '%Y.%m.%d') FROM Momentums WHERE m_Time < (curdate( )-INTERVAL 3 DAY) and m_Time > (CURDATE() - INTERVAL 4 DAY) and dogID = '$dogID'";
dayOutput($link, $sql);
$sql = "SELECT SUM(m_Step), date_format(curdate()-INTERVAL 5 DAY, '%Y.%m.%d') FROM Momentums WHERE m_Time < (curdate( )-INTERVAL 4 DAY) and m_Time > (CURDATE() - INTERVAL 5 DAY) and dogID = '$dogID'";
dayOutput($link, $sql);
$sql = "SELECT SUM(m_Step), date_format(curdate()-INTERVAL 6 DAY, '%Y.%m.%d') FROM Momentums WHERE m_Time <  (curdate( )-INTERVAL 5 DAY) and m_Time > (CURDATE() - INTERVAL 6 DAY) and dogID = '$dogID'";
dayOutput($link, $sql);

function dayOutput($link, $sql){
	if ($result = mysqli_query($link,$sql))
	{
	    $rows = mysqli_fetch_array($result);
    	$StepData = $rows[0];
		$DayData = $rows[1];
    	if(isset($StepData))
	    {
	        echo "$StepData";
	        echo "\t";
	    }
		else
		{
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
