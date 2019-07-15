<?php
include("Connect.php");
 
// 설정
$uploads_dir = './uploads'; // 파일 경로
$allowed_ext = array('jpg','jpeg','png','gif');
 
// 변수 정리
$error = $_FILES['upload']['error']; // 에러
$name = $_FILES['upload']['name']; // 파일 이름
$ext = array_pop(explode('.', $name)); // 확장자
$filename = (explode('.', $name));
$file_size = $_FILES['upload']['size']; // 크기
//$file_type = $_FILES['upload']['type']; // 확장자
$filepath = $_SERVER['DOCUMENT_ROOT'].'/uploads/'; // 경로설정
$userID=isset($_POST['userID']) ? $_POST['userID'] : '';
$filename[0] = $userID;
 
// 오류 확인
if( $error != UPLOAD_ERR_OK ) {
	switch( $error ) {
		case UPLOAD_ERR_INI_SIZE:
		case UPLOAD_ERR_FORM_SIZE:
			echo "파일이 너무 큽니다. ($error)";
			break;
		case UPLOAD_ERR_NO_FILE:
			echo "파일이 첨부되지 않았습니다. ($error)";
			break;
		default:
			echo "파일이 제대로 업로드되지 않았습니다. ($error)";
	}
	exit;
}
 
// 확장자 확인
if( !in_array($ext, $allowed_ext) ) {
	echo "허용되지 않는 확장자입니다.";
	exit;
}
 
// 파일 이동
move_uploaded_file( $_FILES['upload']['tmp_name'], "$uploads_dir/$userID.$filename[1]"); // userID.확장자로 이동되어야함.

echo "<img src = /uploads/{$_FILES['upload']['name']}>";
// 파일 정보 출력
echo "<h2>파일 정보</h2>
	<ul>
		<li>파일명: $name</li>
		<li>확장자: $ext</li>
		<li>파일형식: {$_FILES['upload']['type']}</li>
		<li>파일크기: {$_FILES['upload']['size']} 바이트</li>
		<li>파일 : $filename[0]</li>
		<li>파일 : $filename[1]</li>
	</ul>";


$sql = "UPDATE Users SET imgName = '$userID.$filename[1]' WHERE userID = '$userID'"; // userID받아서 넣어야함. imgName도 userID.확장자
//$sql = "INSERT INTO Users (userID, imgName) VALUES ('Jiyun', '$name')";
$result=mysqli_query($link,$sql);

if($result){
   echo "SQL문 처리 성공";
}
else{
   echo "SQL문 처리중 에러 발생 : ";
   echo mysqli_error($link);
}



//echo("<meta http-equiv='refresh' content='3' url='printimage.php'>");
?>
