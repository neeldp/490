<?php require 'header.php'; require 'backend.php';?>
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="landing.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <img  src="trebleNav.png"/>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="landing.php" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="create_Post.php" class="nav-link px-2 text-white">Create Post</a></li>
          <li><a href="inbox.php" class="nav-link px-2 text-white">Inbox</a></li>
          <li><a href="profile.php" class="nav-link px-2 text-white">Profile</a></li>
          <li><a href="index.php" class="nav-link px-2 text-white">Logout</a></li>
          <?php if($_SESSION['isAdmin']==1){ ?>
          <li><a href="admin.php" class="nav-link px-2 text-white">Create User</a></li>
          <?php } ?>
        </ul>

        <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
        <form method="POST" action='backend.php'>
					<div class='form-group'>
						<label>Search:</label>
						<input class= 'form-control w-25' type="text" name="search">
            <button type="submit" name="searchbtn" value= 'searchbtn' class="searchbtn">Search</button>
					</div>	
				</form>
        </div>
        <div class="text-end"></div>
      </div>
    </div>
  </header>