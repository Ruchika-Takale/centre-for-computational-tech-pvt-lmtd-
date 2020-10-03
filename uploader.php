
<!--
<php
$target_path="D:/";
$target_path=target_path.basename($_FILES['fileToUpload']['name']);
if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_path))
echo"true";
}else{
echo"false";
}

?>
-->
<html>
<body>
<?php
if(isset($_POST['submit'])){
	$target_path="images/";
	$target_path=$target_path.basename($_FILES['fileToUpload']['name']);
	if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_path)){
		$conn=new mysql1("localhost","root","","comp");//connect to databasee server
		$sql="insert into upload_image('path') values('$target_path')";
		if($conn->query($sql)==True){
			echo"<br><br>";
		}
		else
		{
			echo"error".$sql.$conn->error;
		}
		//display uploaded image on same screen
		$sql1="select path from upload_image order by id desc limit 1";
		$result=$conn->query($sql1);
		if(result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$path=$row['path'];
				echo"<img src='$path' heigt='200' width='320'>";
			}
	}
	$conn->close();
}
?>
<body>
</html>