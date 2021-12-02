<?php 
require 'header.php';
require 'backend.php'?>
<header>
	<nav>
		<ul>
			<li><a href="landing.php"><img class = "loginLogo" src="trebleNav.png" /></a></li>
			<li><a href="landing.php">Timeline</a></li>
			<li><a href="create_Post.php">Create post</a></li>
			<li><a href="inbox.php">Inbox</a></li>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="index.php">logout</a></li>
			<?php if($_SESSION['isAdmin']==1){
				echo"<li>";
				echo "<a href='admin.php'>"."Create New User"."</a>"; 
				echo "</li>";}?>
			<li>
			<!--Search Section --> 
			<div div class = "search_post">
				<form method="POST" action='backend.php'>
					<div class='form-group'>
						<label>Search:</label>
						<input class= 'form-control w-25' type="text" name="search">
					</div>	
					<sp><button type="submit" name="searchbtn" value= 'searchbtn' class="searchbtn">Search</button>
				</form>
			</div>
			</li>	
		</ul>
	</nav>
</header>
