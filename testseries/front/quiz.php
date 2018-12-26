<?php include_once "../back/dashboard_left.php";
include_once "../back/check_user_login.php";
include_once "../back/quiz1.php";

session_start();
if(isset($_SESSION['usr_id']) == ""){
	header('Location: /login');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!--<title>Login V2</title>-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/../css/bulma.css">
	<link rel="stylesheet" type="text/css" href="/../css/main.css">
	<link rel="stylesheet" type="text/css" href="/../css/login.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="/../js/jquery-3.2.1.min.js"></script>
	<!-- <script type="text/javascript" src = "/../back/quiz.js" ></script> -->
	<script type="text/javascript" src = "/../js/materialize.js" ></script>
</head>
<style>
	@media screen and (min-width: 640px){
		html{
			background-color: #f7f7f7;
		}
	}
</style>
<body >
	<?php include_once "navbar.php";?>
	<ul id="slide-out" class="side-nav">
  		<a style= "float:right; margin-right:10px;" href="#"><i style ="margin-top: 10px;" class=" material-icons">close</i></a>
  		<div style="padding:50px;">
	  		<div id = "question_no_mobile" style="font-size: 20px;"></div>
	  		<h3 style="font-size: 20px;"> Subject : <spna id = "subject_mobile" style="font-size: 20px;"></spna></h3><br>
	  		<h3>Subjects :</h3><br>
	  		<div id = "subject_links"></div><br>
	  		<h3>Questions :</h3><br>
	  		<div id = "checked_question1"></div>
	  	</div>
  	</ul>
	<section>
		<a style= "float:left;margin-left: 20px;" href="#" data-activates="slide-out" class="button-collapse"><i style = "font-size:25px;" class="large material-icons">menu</i></a>
		<div id="clockdiv" style = 'float:right;margin-right: 20px;'>
		  <div>
		    <span class="days"></span> &nbsp;: <span class="hours"></span> &nbsp;: <span class="minutes"></span> &nbsp;: <span class="seconds"></span>
		  </div>
		</div><br>
		<div class="quiz_sidebar">
			<h2 id = "question_no"></h2>
			<h3>Subject : <span id = "subject"></span></h3><br>
			<h3>Subjects :</h3><br>
			<div id = "subject_links1"></div><br>
			<h3>Questions :</h3><br>
			<div id = "checked_question"></div>
		</div>
			<div class = "right">
				<center>
					<div class = "quiz_box" id = "result" style="display: none;"></div><br>
					<div class = "quiz_box">
						<div id = "question" style="word-wrap: break-word;"></div>
					</div>
				</center>
			</div>
	</section>
</body>
</html>
<script>
	function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
     t = getTimeRemaining(endtime);

    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
    	submit();
      clearInterval(timeinterval);
    }
  }

  updateClock();
   timeinterval = setInterval(updateClock, 1000);
}

var deadline = new Date(Date.parse(new Date()) +   duration*60 * 60 * 1000);
initializeClock('clockdiv', deadline);
	var subject = 0, question=0, pos = 0;
	var correct = new Array(subject.length).fill(0);
	for (var i =0; i<subjects.length;i++){
		correct[i] = new Array(data[subjects[i]].length).fill(0);
		$('#subject_links').append('<button style = "font-size:14px;margin:5px;" class = "button" onclick = "sub('+parseInt(i)+')">'+subjects[i]+'</button>');
		$('#subject_links1').append('<button style = "font-size:14px;margin:5px;" class = "button" onclick = "sub('+parseInt(i)+')">'+subjects[i]+'</button>');
	}
	function sub(id){
		subject = id;
		question = 0;
		quizRender();
	}
	function que(id){
		question = id;
		quizRender();
	}
	//console.log(correct);
	//console.log(data[subjects[subject]].length);
	//console.log(data[subjects[subject]][question]['statement']);
	function quizRender(){
		if(subject > subjects.length-1){
			document.getElementById('next').style.display = 'none';
			document.getElementById('submit').style.display = '';
		}
		//if (subject > subjects.length)
		//console.log(data[subjects[subject]][question]['answer']);
		///document.getElementById('question_no').innerHTML = 'Question '+(question+1);
		$('#checked_question').html('');
		$('#checked_question1').html('');
		for(var i = 0; i<correct[subject].length; i++){
			if(correct[subject][i] != 0){
				//console.log("if");
				$('#checked_question').append('<button onclick = "que('+i+')"><label class = "label" style="display:inline-block;font-size:14px;margin:2px;width:40px;"><input type = "checkbox" class= "option-input radio" checked disabled>'+parseInt(i+1)+'</label></button>')
				$('#checked_question1').append('<button onclick = "que('+i+')"><label class = "label" style="display:inline-block;font-size:14px;margin:2px;width:40px;"><input type = "checkbox" class= "option-input radio" checked disabled>'+parseInt(i+1)+'</label></button>')
			}
			else {
				//console.log("else");
				$('#checked_question').append('<button onclick = "que('+i+')"><label class = "label" style="display:inline-block;font-size:14px;margin:2px;width:40px;"><input type = "checkbox" class= "option-input radio" disabled>'+parseInt(i+1)+'</label></button>');
				$('#checked_question1').append('<button onclick = "que('+i+')"><label class = "label" style="display:inline-block;font-size:14px;margin:2px;width:40px;"><input type = "checkbox" class= "option-input radio" disabled>'+parseInt(i+1)+'</label></button>');
			}
		}
		$('#question_no').html('Question : '+(question+1));
		$('#subject').html(subjects[subject]);
		$('#question_no_mobile').html('Question : '+(question+1));
		$('#subject_mobile').html(subjects[subject]);
		$('#question').html("<b><h1>"+data[subjects[subject]][question]['statement']+"</h1></b><br><br><label class = 'label'><input type='radio' class= 'option-input radio' id = '1' name='choice' value='1'>"+data[subjects[subject]][question]['1']+"</label><br><label class = 'label'><input class= 'option-input radio' type='radio' id = '2' name='choice' value='2'>"+data[subjects[subject]][question]['2']+"</label><br><label class = 'label'><input class= 'option-input radio' type='radio' id = '3' name='choice' value='3'>"+data[subjects[subject]][question]['3']+"</label><br><label class = 'label'><input class= 'option-input radio' type='radio' id = '4' name='choice' value='4'>"+data[subjects[subject]][question]['4']+"</label><br><button class='button is-info' onclick='previous()'>PREVIOUS</button>&nbsp;<button class='button is-info' id ='next' onclick='check()'>NEXT</button>&nbsp;<button class='button is-info' id ='skip' onclick='skip()'>SKIP</button>&nbsp;<button class='button is-success' style = 'display:none;' id = 'submit' onclick = 'submit()'>SUBMIT</button>");
		switch(correct[subject][question]){
			case "0":
				document.getElementById('1').checked = false;
				document.getElementById('2').checked = false;
				document.getElementById('3').checked = false;
				document.getElementById('4').checked = false;
				break;
			case "1":
				document.getElementById('1').checked = true;
				document.getElementById('2').checked = false;
				document.getElementById('3').checked = false;
				document.getElementById('4').checked = false;
				break;
			case "2":
				document.getElementById('1').checked = false;
				document.getElementById('2').checked = true;
				document.getElementById('3').checked = false;
				document.getElementById('4').checked = false;
				break;
			case "3":
				document.getElementById('1').checked = false;
				document.getElementById('2').checked = false;
				document.getElementById('3').checked = true;
				document.getElementById('4').checked = false;
				break;
			case "4":
				document.getElementById('1').checked = false;
				document.getElementById('2').checked = false;
				document.getElementById('3').checked = false;
				document.getElementById('4').checked = true;
				break;
		}
	}
	function skip(){
		if(question == data[subjects[subject]].length-1){
			question = 0;
			subject ++;
		}else question++;
		quizRender();
	}
	function check(){
		c = document.querySelector('input[name="choice"]:checked').value;
		//console.log(t);
		correct[subject][question] = c;
		// if (c == data[subjects[subject]][question]['answer']){
		// 	correct++;
		// }
		if (question == data[subjects[subject]].length-1){
			question = 0;
			subject ++;
		}
		else question ++;
		quizRender();
	}
	function previous(){
		if(subject == 0 && question == 0){
			subject = subjects.length-1;
		}
		if (question == 0){
			subject--;
			question = data[subjects[subject]].length-1;
		}
		else question --;
		quizRender();
	}
	function submit(){
		ans = 0;
		$('#question').html('');
		for(var i = 0; i < subjects.length; i++){
			$('#question').append('<center><h2 style="font-size:24px;">'+subjects[i]+'</h2></center><br>');
			for (var j = 0; j < data[subjects[i]].length; j++){
				$('#question').append('<h1>Q '+(j+1)+'. '+data[subjects[i]][j]['statement']+'</h1><br>');
				switch(data[subjects[i]][j]['answer']){
					case "1":
						$('#question').append('<label class = "label"><input type = "checkbox" class= "option-input radio" checked disabled>'+data[subjects[i]][j]['1']+'</label><br>');
						// $('#question').append('<label class = "label"><input type = "checkbox" class= "option-input radio">'+data[subjects[i]][j]['2']+'</label><br>');
						// $('#question').append('<label class = "label"><input type = "checkbox" class= "option-input radio">'+data[subjects[i]][j]['3']+'</label><br>');
						// $('#question').append('<label class = "label"><input type = "checkbox" class= "option-input radio">'+data[subjects[i]][j]['4']+'</label><br>');
						break;
					case "2":
						// $('#question').append('<label class = "label"><input type = "checkbox" class= "option-input radio">'+data[subjects[i]][j]['1']+'</label><br>');
						$('#question').append('<label class = "label"><input type = "checkbox" class= "option-input radio" checked disabled>'+data[subjects[i]][j]['2']+'</label><br>');
						// $('#question').append('<label class = "label"><input type = "checkbox" class= "option-input radio">'+data[subjects[i]][j]['3']+'</label><br>');
						// $('#question').append('<label class = "label"><input type = "checkbox" class= "option-input radio">'+data[subjects[i]][j]['4']+'</label><br>');
						break;
					case "3":
						// $('#question').append('<label class = "label"><input type = "checkbox" class= "option-input radio">'+data[subjects[i]][j]['1']+'</label><br>');
						// $('#question').append('<label class = "label"><input type = "checkbox" class= "option-input radio">'+data[subjects[i]][j]['2']+'</label><br>');
						$('#question').append('<label class = "label"><input type = "checkbox" class= "option-input radio" checked disabled>'+data[subjects[i]][j]['3']+'</label><br>');
						// $('#question').append('<label class = "label"><input type = "checkbox" class= "option-input radio">'+data[subjects[i]][j]['4']+'</label><br>');
						break;
					case "4":
						// $('#question').append('<label class = "label"><input type = "checkbox" class= "option-input radio">'+data[subjects[i]][j]['1']+'</label><br>');
						// $('#question').append('<label class = "label"><input type = "checkbox" class= "option-input radio">'+data[subjects[i]][j]['2']+'</label><br>');
						// $('#question').append('<label class = "label"><input type = "checkbox" class= "option-input radio">'+data[subjects[i]][j]['3']+'</label><br>');
						$('#question').append('<label class = "label"><input type = "checkbox" class= "option-input radio" checked disabled>'+data[subjects[i]][j]['4']+'</label><br>');
						break;
				}
				if(correct[i][j] != data[subjects[i]][j]['answer']){
					switch(correct[i][j]){
						case "1":
							$('#question').append('<label class = "label"><input type = "checkbox" class= "radio option-input-wrong" checked disabled>'+data[subjects[i]][j]['1']+'</label><br>');
							break;
						case "2":
							$('#question').append('<label class = "label"><input type = "checkbox" class= "option-input-wrong radio" checked disabled>'+data[subjects[i]][j]['2']+'</label><br>');
							break;
						case "3":
							$('#question').append('<label class = "label"><input type = "checkbox" class= "option-input-wrong radio" checked disabled>'+data[subjects[i]][j]['3']+'</label><br>');
							break;
						case "4":
							$('#question').append('<label class = "label"><input type = "checkbox" class= "option-input-wrong radio" checked disabled>'+data[subjects[i]][j]['4']+'</label><br>');
							break;
					}
				}
				$('#question').append('<h4>'+data[subjects[i]][j]['description']+'</h4>');
				$('#question').append('<hr>');
				if (correct[i][j] == data[subjects[i]][j]['answer'])
					ans++;
			}
		}
		var rank = Math.floor((Math.random() * 5000) + 100);
		$('#result').html('<center><h3>RESULT</h3></center><hr><div style = "margin-bottom:40px;"><span style = "float:left;">Your Rank : '+rank+'</span><span style = "float:right;">You Scored '+ans+' Out of '+no_of_question+'</span></div>');
		document.getElementById('result').style.display = '';
		//t.total = 0;
		//updateClock();
	}
window.addEventListener("load", quizRender,false);

$(".button-collapse").sideNav();
     $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 300
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
  );
     document.onkeydown = function() {    
    switch (event.keyCode) { 
        case 116 : //F5 button
            event.returnValue = false;
            event.keyCode = 0;
            return false; 
        case 82 : //R button
            if (event.ctrlKey) { 
                event.returnValue = false; 
                event.keyCode = 0;  
                return false; 
            } 
    }
}
window.onbeforeunload = function() {
        return "Dude, are you sure you want to leave? Think of the kittens!";
    }
</script>