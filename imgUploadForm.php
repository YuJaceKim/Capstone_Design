<?php
 echo "file upload program<br />";
 echo "select the file<br />";
?>

<form method="post" action="imgUpload.php" enctype="multipart/form-data">
<input type="text" name="userID">
<input type="file" size=100 name="upload"><hr>
<input type="submit" value="send">
</form>
