<?php
include_once "dbconnect.php";
function random($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

$quiz_id = $_POST['quiz_id'];
$no_of_question = 0;
$result = mysqli_query($con,"SELECT * from subjects where quiz_id = '{$quiz_id}'");
$subjects = array();
$subject = array();
while($row = mysqli_fetch_array($result)){
	$result2 = mysqli_query($con,"SELECT * from total_subjects where subject_name = '{$row['subject_name']}'");
	$row2 = mysqli_fetch_array($result2);
	$temp = random(1,$row2['last_question'],$row['questions']);
	array_push($subject, $row['subject_name']);
	$no_of_question += (int)$row['questions'];
	$subjects[$row['subject_name']] = $temp;
}
//print_r($subjects);
//print_r($subject);
$quiz = array();
for ($i=0; $i <sizeof($subject); $i++) {
	$temp = array();
	for ($j=0; $j <sizeof($subjects[$subject[$i]]) ; $j++) {
		$subject_name = $subject[$i];
		$file_name = $subjects[$subject[$i]][$j];
		//echo($subjects[$subject[$i]][$j]);
		//echo('../assets/question/subjects/'.strtolower($subject_name).'/'.$file_name);
		$statement = explode("@", file_get_contents("../assets/questions/subjects/".$subject_name."/".$file_name))[0];
		$option_one = explode("@", file_get_contents("../assets/questions/subjects/".$subject_name."/".$file_name))[1];
		$option_two = explode("@", file_get_contents("../assets/questions/subjects/".$subject_name."/".$file_name))[2];
		$option_three = explode("@", file_get_contents("../assets/questions/subjects/".$subject_name."/".$file_name))[3];
		$option_four = explode("@", file_get_contents("../assets/questions/subjects/".$subject_name."/".$file_name))[4];
		$answer = explode("@", file_get_contents("../assets/questions/subjects/".$subject_name."/".$file_name))[5];
		$description = explode("@", file_get_contents("../assets/questions/subjects/".$subject_name."/".$file_name))[6];
		//echo($statement);
		array_push($temp,array('statement' => $statement,'1' => $option_one, '2' => $option_two,'3' => $option_three,'4' => $option_four,'answer' => $answer,'description' => $description));
	}
	$quiz[$subject[$i]] = $temp;
}
$result = mysqli_query($con,"SELECT * from quiz where id = '{$quiz_id}'");
$row = mysqli_fetch_array($result);
//echo($row['duration']);
$duration = (int)$row['duration'];
$duration = 'var duration = '.$duration.';';
$negative_marking = 'var negative_marking = '.(int)$row['negative_marking'].';';
//print_r($quiz['Aptitude'][0]['statement']);
//echo($subject[1]);
$i = 0;
$j = 0;
//echo($quiz[$subject[$i]][$j]['statement']);
$data = json_encode($quiz);
$data = 'var data = '.$data.';';
$file = fopen('quiz1.php', 'w');
$data2 = json_encode($subject);
$data2 = 'var subjects = '.$data2.';';
$data3 = 'var no_of_question = '.$no_of_question.';';
fwrite($file, '<script>');
fwrite($file, $data);
fwrite($file, $data2);
fwrite($file, $data3);
fwrite($file, $duration);
fwrite($file, $negative_marking);
fwrite($file, '</script>');
fclose($file);
header("Location: /quiz");
exit ();
?>