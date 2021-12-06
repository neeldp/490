<?php require 'header.php'; require 'backend.php';?>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="landing.php">Timeline</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="landing.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create_Post.php">Create Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="inbox.php">Inbox</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Logout</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="POST" action='backend.php'>
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="searchbtn" value= 'searchbtn'>Search</button>
    </form>
  </div>
</nav>