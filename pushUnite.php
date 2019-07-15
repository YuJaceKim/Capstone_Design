<?php 
include("Connect.php");


$dogID=isset($_POST['dogID']) ? $_POST['dogID'] : ''; 
$feeling=isset($_POST['feeling']) ? $_POST['feeling'] : '';
$e_Time = date("Y-m-d H:i:s");

if ($dogID !="" and $feeling !=""){
      $sql="INSERT INTO Unite VALUES ('$e_Time', '$dogID', '$feeling')";
    $result=mysqli_query($link,$sql);
    if($result){
       echo "success";
    }  
    else{
       echo "fail";
       echo mysqli_error($link);
    } 
 
} else {
    echo "No data";
}
mysqli_close($link); 
?> 
<?php 
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android"); 
if (!$android){ 
?> 

<html>
   <body>
   
      <form action="<?php $_PHP_SELF ?>" method="POST">
        dogID: <input type = "text" name = "dogID" />
        feeling: <input type = "text" name = "feeling" />
         <input type = "submit" />
      </form>
   
   </body> 
</html> 
<?php
}
?>
