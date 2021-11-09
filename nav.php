<?php require 'header.php';?>
<header>
	<nav>
		<ul>
			<li><a href="landing.php">Timeline</a></li>
			<li><a href="create_Post.php">Create post</a></li>
			<li><a href="sendMessage.php">Send a Message.</a></li>
			<li><a href="inbox.php">Inbox</a></li>
			<li><a href="index.php">logout</a></li>
			<?php if($_SESSION['isAdmin']==1){
				echo"<li>";
				echo "<a href='admin.php'>"."Admin"."</a>"; 
				echo "</li>";}?>
			<li>
			<!--Search Section --> 
			<div div class = "search_post">
				<form method="POST" action='searchresults.php'>
					<div class='form-group'>
						<label>Search:</label>
						<input class= 'form-control w-25' type="text" name="search">
					</div>	
					<sp><button type="submit" name="searchbtn" value= 'searchbtn' class="searchbtn">Search</button>
				</form>
			</div>
			</li>	
			<li>
				<p>
				<a href="http://jigsaw.w3.org/css-validator/check/referer">
					<img style="border:0;width:88px;height:31px"
						src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
						alt="valid css" >
					</a>
				</p>
		</ul>
	</nav>
</header>