<?php require 'header.php'; require 'nav.php'; ?>

<!-- This file is used for creating a post for the CS 490 SEC. 003 Group 8 Simple Social Media Project -->

<body>
</br>
<div class='container'>
	<div class='row'> 
		<div card ="col-lg-7">
			<div class='card mb-4'>
				<div class='card-body'> 
					<h1> Send a Message </h1>
					<div class='card mb-4'>
						<div class='card-body'> 
                            <form method='POST' action ='backend.php'>
                                <div class='form-group'>
                                    <label>To:</label>
                                    <input class= 'form-control w-25' type="text" name="to">
                                    <label>Message:</label>
                                    <input class= 'form-control w-25' type="text" name="message">
                                </div>
                                <button class = 'btn btn-outline-info' type="submit" name="submitMsg" value= 'message' class="submitMsg">Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div></div>
        </div>
    </div>     
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
