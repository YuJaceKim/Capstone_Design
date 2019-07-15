<?php
include("Connect.php");


$dogID=isset($_GET['dogID']) ? $_GET['dogID'] : '';
// 일 년 치의 Step 총합을 가져온다.
$sql = "SELECT SUM(m_Step) FROM `Momentums` WHERE date(m_Time) >= date_format(now(), '%Y-%1-01') and date(m_Time) <= last_day(now()) AND dogID = '$dogID'";

$sql = "SELECT SUM(m_Step) FROM `Momentums` WHERE date(m_Time) >= date_format(date_add(now(), INTERVAL -1 YEAR), '%Y-%1-01') and date(m_Time) <= date_format(date_add(now(), INTERVAL -1 YEAR), '%Y-%12-31') AND dogID = '$dogID'";

if ($result = mysqli_query($link,$sql))
{
	
	$rows = mysqli_fetch_array($result);
	$StepData = $rows[0];
	$cnt = date("z"); // 올해의 경과일수
	$Day = $cnt+1; // 0부터 시작하므로 1을 추가
	if($StepData)
	{
	// 일 년의 평균치 계산
		$calc = $StepData/$Day;
		// 소수점 버리고 출력
		echo floor("$calc");
	}
}
else
{
	echo "SQL문 처리중 에러발생 : ";
}
?>
