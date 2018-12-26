<?php
//include_once "../dbconnect.php";
if(isset($_GET['path'])){
	$path ='../../'. $_GET['path'];
	$statement = explode("@", file_get_contents($path))[0];
	$option1 = explode("@", file_get_contents($path))[1];
	$option2 = explode("@", file_get_contents($path))[2];
	$option3 = explode("@", file_get_contents($path))[3];
	$option4 = explode("@", file_get_contents($path))[4];
	$answer = explode("@", file_get_contents($path))[5];
	$description = explode("@", file_get_contents($path))[6];
}
elseif($_POST['chek'] == 'save_question'){
	$problem = $_POST['problem'];
	$option1 = $_POST['option1'];
	$option2 = $_POST['option2'];
	$option3 = $_POST['option3'];
	$option4 = $_POST['option4'];
	$answer = $_POST['answer'];
	$path = $_POST['path'];
	$description = $_POST['description'];
	$file = fopen($path,'w');
	$data = $problem.'@'.$option1.'@'.$option2.'@'.$option3.'@'.$option4.'@'.$answer.'@'.$description;
	fwrite($file, $data);
	fclose($file);
	exit('done');
}

?>