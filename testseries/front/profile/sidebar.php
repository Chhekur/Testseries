<?php include_once "../../back/check_user_login.php";?>
<div class = "desktop-profile-sidebar">
	<div id = "left_sidebar" class = "profile-sidebar"><br>
		<center>
			<div style="border-bottom:1px solid #4e4e52; width: 80%;">
				<img class = "user-photo" src = "/../assets/usr/<?php echo $_SESSION['usr_id'];?>.jpg" onError="this.onerror=null;this.src='/../assets/usr/sample.png';" />
				<form action="/../../back/upload_image.php" method="post" enctype="multipart/form-data" style="margin:0px;">
		          <label for="file" style="cursor:pointer;"><i style = "font-size:30px;color:white;background-color:#62a8ea; border-radius:100%;font-size:20px;border:solid #62a8ea 5px;" class="small material-icons">camera_alt</i><input id="file" name ="file" type="file" onchange="this.form.submit()" style="opacity: 0;"></label>
		          </form>
				<h4><?php echo $_SESSION['usr_name'];?></h4>
				<h4><?php echo $_SESSION['validity'];?> days left</h4><br>
			</div><br>
			<div id = "menu" style="text-align: left;">
				<div class = "tab">
					<center>
						<input class = "menu-input" id="tab-referral" type="checkbox" name="tabs">
						      <button class = "button is-danger" style = "height:30px;margin-left:1em;font-size:14px;"><label for="tab-referral" style = "cursor:pointer;">Referral</label></button>
						      <div class="tab-content" style = "margin-left:1em;">
						      	  <div class = "social-icons">
						      	  	<a href="https://www.facebook.com/sharer.php?u=http://testseries.deepgroups.com/signup?referral=<?php echo $_SESSION['refral_code'];?>" target="_blank">
						      	  		<img class = "social-icon-facebook svg" src = "/assets/social_icons/facebook.svg"></img>
						      	  	</a>
						      	  </div>
						      	  <div class = "social-icons">
						      	  	<a href="https://plus.google.com/share?url=http://testseries.deepgroups.com/signup?referral=<?php echo $_SESSION['refral_code'];?>" target="_blank">
						      	  		<img class = "svg social-icon-google_plus" src = "/assets/social_icons/google_plus.svg"></img>
						      	  	</a>
						      	  </div>
						      	  <div class = "social-icons">
						      	  	<a href="https://twitter.com/share?url=http://testseries.deepgroups.com/signup?referral=<?php echo $_SESSION['refral_code'];?>" target="_blank">
						      	  		<img class = "svg social-icon-twitter" src = "/assets/social_icons/twitter.svg"></img>
						      	  	</a>
						      	  </div>
						      	  <div class = "social-icons">
						      	  	<a href="whatsapp://send?text=http://testseries.deepgroups.com/signup?referral=<?php echo $_SESSION['refral_code'];?>" data-action="share/whatsapp/share">
						      	  		<img class = "svg social-icon-whatsapp" src = "/assets/social_icons/whatsapp.svg"></img>
						      	  	</a>
						      	  </div>
						      </div>
						<center>
				</div>
				<div class = "tab">
					<label onclick = "window.location.href='/profile/dashboard'" class = "menu-label" for="tab-four"><i class="material-icons" style="font-size: 13px;">dashboard</i>&nbsp;&nbsp;Dashboard</label>
				</div>
				<?php if ($_SESSION['usr_designation'] == 'admin'){?>
					<div class="tab">
						<input class = "menu-input" id="tab-three" type="checkbox" name="tabs">
					      <label class = "menu-label" for="tab-three"><i class="material-icons" style="font-size: 13px;">build</i>&nbsp;&nbsp;Main</label>
					      <div class="tab-content">
					      	  <a href = "/profile/quiz" class = "sub-menu"><i class="material-icons" style="font-size: 13px;">add_box</i>&nbsp;&nbsp;Quiz</a>
					      	  <a href = "/profile/categories" class = "sub-menu"><i class="material-icons" style="font-size: 13px;">add_box</i>&nbsp;&nbsp;Categories</a>
					      	  <a href = "/profile/subjects" class = "sub-menu"><i class="material-icons" style="font-size: 13px;">add_box</i>&nbsp;&nbsp;Subjects</a>
					      	  <a href = "/profile/add_question" class = "sub-menu"><i class="material-icons" style="font-size: 13px;">add_box</i>&nbsp;&nbsp;Add Question</a>
					      	  <a href = "/profile/existing_questions" class = "sub-menu"><i class="material-icons" style="font-size: 13px;">add_box</i>&nbsp;&nbsp;Existing Questions</a>
					      </div>
				  	</div>
					<div class="tab">
						<input class = "menu-input" id="tab-one" type="checkbox" name="tabs">
					      <label class = "menu-label" for="tab-one"><i class="material-icons" style="font-size: 13px;">account_box</i>&nbsp;&nbsp;Users</label>
					      <div class="tab-content">
					      	  <a href = "/profile/active_users" class = "sub-menu"><i class="material-icons" style="font-size: 13px;">verified_user</i>&nbsp;&nbsp;Active Users</a>
					      	  <a href = "/profile/pending_users" class = "sub-menu"><i class="material-icons" style="font-size: 13px;">warning</i>&nbsp;&nbsp;Pending Users</a>
					      	  <a href = "/profile/suspended_users" class = "sub-menu"><i class="material-icons" style="font-size: 13px;">do_not_disturb</i>&nbsp;&nbsp;Suspended Users</a>
					      </div>
				  	</div>
			  	<?php }?>
			  	<div class = "tab">
					<label onclick = "window.location.href='/profile/plans'" class = "menu-label" for="tab-four"><i class="material-icons" style="font-size: 13px;">monetization_on</i>&nbsp;&nbsp;Recharge</label>
				</div>
			     <div class="tab">
					<input class = "menu-input" id="tab-two" type="checkbox" name="tabs">
				      <label class = "menu-label" for="tab-two"><i class="material-icons" style="font-size: 13px;">settings</i>&nbsp;&nbsp;Settings</label>
				      <div class="tab-content">
				      	  <a href = "/profile/general" class = "sub-menu"><i class="material-icons" style="font-size: 13px;">edit</i>&nbsp;&nbsp;General</a>
				      	  <a href = "/profile/change_password" class = "sub-menu"><i class="material-icons" style="font-size: 13px;">edit</i>&nbsp;&nbsp;Change Password</a>
				      </div>
			  	</div>
			</div>
		</center>
	</div>
</div>
<ul id="slide-out" class="side-nav" style="background-color: #272c33;color:#d7d9e3;">
	<a style= "float:right; margin-right:10px;" href="#"><i style ="margin-top: 10px;" class=" material-icons">close</i></a>
	<center><div id = "left_sidebar"><br>
		<div style="border-bottom:1px solid #4e4e52; width: 80%;">
			<img class = "user-photo" src = "/../assets/usr/<?php echo $_SESSION['usr_id'];?>.jpg" onError="this.onerror=null;this.src='/../assets/usr/sample.png';" />
			<form action="/../../back/upload_image.php" method="post" enctype="multipart/form-data" style="margin:0px;">
	          <label for="file" style="cursor:pointer;"><i style = "font-size:30px;color:white;background-color:#62a8ea; border-radius:100%;font-size:20px;border:solid #62a8ea 5px;" class="small material-icons">camera_alt</i><input id="file" name ="file" type="file" onchange="this.form.submit()" style="opacity: 0;"></label>
	          </form>
			<h4><?php echo $_SESSION['usr_name'];?></h4>
			<h4><?php echo $_SESSION['validity'];?> days left</h4><br></div>
			<div id = "menu" style="text-align: left;">
				<br>
				<div class = "tab">
					<center>
						<input class = "menu-input" id="tab-referral1" type="checkbox" name="tabs">
						      <button class = "button is-danger" style = "height:30px;margin-left:1em;font-size:14px;"><label for="tab-referral1" style = "cursor:pointer;">Referral</label></button>
						      <div class="tab-content" style = "margin-left:1em;">
						      	  <div class = "social-icons">
						      	  	<a href="https://www.facebook.com/sharer.php?u=http://testseries.deepgroups.com/signup?referral=<?php echo $_SESSION['refral_code'];?>" target="_blank">
						      	  		<img class = "social-icon-facebook svg" src = "/assets/social_icons/facebook.svg"></img>
						      	  	</a>
						      	  </div>
						      	  <div class = "social-icons">
						      	  	<a href="https://plus.google.com/share?url=http://testseries.deepgroups.com/signup?referral=<?php echo $_SESSION['refral_code'];?>" target="_blank">
						      	  		<img class = "svg social-icon-google_plus" src = "/assets/social_icons/google_plus.svg"></img>
						      	  	</a>
						      	  </div>
						      	  <div class = "social-icons">
						      	  	<a href="https://twitter.com/share?url=http://testseries.deepgroups.com/signup?referral=<?php echo $_SESSION['refral_code'];?>" target="_blank">
						      	  		<img class = "svg social-icon-twitter" src = "/assets/social_icons/twitter.svg"></img>
						      	  	</a>
						      	  </div>
						      	  <div class = "social-icons">
						      	  	<a href="whatsapp://send?text=http://testseries.deepgroups.com/signup?referral=<?php echo $_SESSION['refral_code'];?>" data-action="share/whatsapp/share">
						      	  		<img class = "svg social-icon-whatsapp" src = "/assets/social_icons/whatsapp.svg"></img>
						      	  	</a>
						      	  </div>
						      </div>
						<center>
				</div>
				<div class = "tab">
					<label onclick = "window.location.href='/profile/dashboard'" class = "menu-label" for="tab-five"><i class="material-icons" style="font-size: 13px;">dashboard</i>&nbsp;&nbsp;Dashboard</label>
				</div>
				<?php if ($_SESSION['usr_designation'] == 'admin'){?>
					<div class="tab">
						<input class = "menu-input" id="tab-six" type="checkbox" name="tabs">
					      <label class = "menu-label" for="tab-six"><i class="material-icons" style="font-size: 13px;">build</i>&nbsp;&nbsp;Main</label>
					      <div class="tab-content">
					      	  <a href = "/profile/quiz" class = "sub-menu"><i class="material-icons" style="font-size: 13px;">add_box</i>&nbsp;&nbsp;Quiz</a>
					      	  <a href = "/profile/categories" class = "sub-menu"><i class="material-icons" style="font-size: 13px;">add_box</i>&nbsp;&nbsp;Categories</a>
					      	  <a href = "/profile/subjects" class = "sub-menu"><i class="material-icons" style="font-size: 13px;">add_box</i>&nbsp;&nbsp;Subjects</a>
					      	  <a href = "/profile/add_question" class = "sub-menu"><i class="material-icons" style="font-size: 13px;">add_box</i>&nbsp;&nbsp;Add Question</a>
					      	  <a href = "/profile/existing_questions" class = "sub-menu"><i class="material-icons" style="font-size: 13px;">add_box</i>&nbsp;&nbsp;Existing Questions</a>
					      </div>
				  	</div>
					<div class="tab">
						<input class = "menu-input" id="tab-seven" type="checkbox" name="tabs">
					      <label class = "menu-label" for="tab-seven"><i class="material-icons" style="font-size: 13px;">account_box</i>&nbsp;&nbsp;Users</label>
					      <div class="tab-content">
					      	  <a href = "/profile/active_users" class = "sub-menu"><i class="material-icons" style="font-size: 13px;">verified_user</i>&nbsp;&nbsp;Active Users</a>
					      	  <a href = "/profile/pending_users" class = "sub-menu"><i class="material-icons" style="font-size: 13px;">warning</i>&nbsp;&nbsp;Pending Users</a>
					      	  <a href = "/profile/suspended_users" class = "sub-menu"><i class="material-icons" style="font-size: 13px;">do_not_disturb</i>&nbsp;&nbsp;Suspended Users</a>
					      </div>
				  	</div>
				 <?php }?>
				 <div class = "tab">
					<label onclick = "window.location.href='/profile/plans'" class = "menu-label" for="tab-four"><i class="material-icons" style="font-size: 13px;">monetization_on</i>&nbsp;&nbsp;Recharge</label>
				</div>
			     <div class="tab">
					<input class = "menu-input" id="tab-eight" type="checkbox" name="tabs">
				      <label class = "menu-label" for="tab-eight"><i class="material-icons" style="font-size: 13px;">settings</i>&nbsp;&nbsp;Settings</label>
				      <div class="tab-content">
				      	  <a href = "/profile/general" class = "sub-menu"><i class="material-icons" style="font-size: 13px;">edit</i>&nbsp;&nbsp;General</a>
				      	  <a href = "/profile/change_password" class = "sub-menu"><i class="material-icons" style="font-size: 13px;">edit</i>&nbsp;&nbsp;Change Password</a>
				      </div>
			  	</div>
			</div>
		</center>
	</div>
</ul>
