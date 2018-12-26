<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Test Series</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="/../../css/bulma.css">
		<link rel="stylesheet" type="text/css" href="/../css/main.css">
		<link rel="stylesheet" type="text/css" href="/../css/login.css">
		<script src="/../js/jquery-3.2.1.min.js"></script>
	</head>
	<style>
		@media screen and (min-width: 640px){
			html{
				background-color: #f7f7f7;
			}
		}
	</style>
	<body>
		<?php include_once "navbar_home.php";?>
		<section>
			<center>
				<button class = "button is-danger" onclick="getFreeCards()" style="width: 150px;">FREE</button>
				<button class = "button is-success" onclick="getPaidCards()" style="width: 150px;">Paid</button>
				<div id = "container">
				</div>
			</center>
		</section>
	</body>
</html>
<script>
	function getFreeCards(){
		$.ajax({
			url : 'back/index.php',
			method : 'post',
			data : {'chek' : 'getFreeCards'},
			success:function(response){
				$('#container').html(response);
			}
		});
	}
	function getPaidCards(){
		$.ajax({
			url : 'back/index.php',
			method : 'post',
			data : {'chek' : 'getPaidCards'},
			success:function(response){
				$('#container').html(response);
			}
		});
	}
	window.onload = function(){getFreeCards();}
</script>