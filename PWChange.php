<?PHP
include("Connect.php");

$userID=isset($_POST['userID']) ? $_POST['userID'] : '';
$passwd=isset($_POST['passwd']) ? $_POST['passwd'] : '';

//if ($userID !="" and $passwd !=""){
    $sql="UPDATE Users SET passWord = '$passwd' WHERE userID = '$userID'";
    $result=mysqli_query($link,$sql);
    if($result){
       echo "SQL문 처리 성공";
    }
    else{
       echo "SQL문 처리중 에러 발생 : ";
       echo mysqli_error($link);
    }

//} else {
//    echo "데이터를 입력하세요 ";
//}
mysqli_close($link);
?>
<?php
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
if (!$android){
?>

<html>
   <body>

      <form action="<?php $_PHP_SELF ?>" method="POST">
        userID: <input type = "text" name = "userID" />
        passwd: <input type = "text" name = "passwd" />
         <input type = "submit" />
      </form>

   </body>
</html>
<?php
}
?>
