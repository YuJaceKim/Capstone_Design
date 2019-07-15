<?PHP
// DB 연결파일
error_reporting(E_ALL);
ini_set('display_errors',1);

$link=mysqli_connect("localhost:3306", "testuser", "test", "TOP");
if (!$link)
{
        echo "MySQL 접 속 에 러 : ";
        echo mysqli_connect_error();
        exit();
}
//else
//{
//	echo "MySQL 접속";
//}
mysqli_set_charset($link, "utf8");
?>
