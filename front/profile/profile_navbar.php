<nav class = "nav-profile">
	<div class = "side-menu">
		<a href="#" data-activates="slide-out" class="button-collapse"><i style = "font-size:25px;margin-top: 10px;margin-left:10px;" class="large material-icons">menu</i></a>
	</div>
	<div class = "nav_usr">
		<a href="#" data-activates="slide-out100" class="button-collapse100"><img class = "user" src = "/../assets/usr/<?php echo $_SESSION['usr_id'];?>.jpg" onError="this.onerror=null;this.src='/../assets/usr/sample.png';" /></a>
	</div>
</nav>
<ul id="slide-out100" class="side-nav">
	<a style= "float:right; margin-right:10px;" href="#"><i style ="margin-top: 10px;" class=" material-icons">close</i></a>
	<center>
		<div style="padding:50px;padding-bottom: 10px;">
			<img class = "user-photo" src = "/../assets/usr/<?php echo $_SESSION['usr_id'];?>.jpg" onError="this.onerror=null;this.src='/../assets/usr/sample.png';" />
		<h4><?php echo $_SESSION['usr_name'];?></h4>
		<!-- <h4><?php echo $_SESSION['validity'];?> days left</h4> --><hr>
	</div>
</center>
		<li><a href="/" style="text-decoration: none;"><i class="material-icons">home</i>Home</a></li>
		<li><a href="/dashboard" style="text-decoration: none;"><i class="material-icons">dashboard</i>Dashboard</a></li>
		<li><a href="/profile" style="text-decoration: none;"><i class="material-icons">person_outline</i>Profile</a></li>
		<li><a href="https://www.deepgroups.com/faq-support/" style="text-decoration: none;"><i class="material-icons">report</i>FAQ & Support</a></li>
		<li><a href="/logout" style="cursor: pointer;color:rgba(0, 0, 0, 0.87); text-decoration: none;"><i class="material-icons">undo</i>Logout</a></li>
</ul>
<script>
	$(".button-collapse100").sideNav();
	     $('.button-collapse100').sideNav({
	      menuWidth: 300, // Default is 300
	      edge: 'left', // Choose the horizontal origin
	      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
	      draggable: true // Choose whether you can drag to open on touch screens
	    }
  );
</script>