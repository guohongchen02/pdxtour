<!DOCTYPE html>

<html lang="en">
	
<head>
	
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="author" content="Guohong Chen">
	
<title>Contact Us | Portland Historical Tours</title>	
	
<link rel="stylesheet" href="css/style.css">
<script src='script/jquery.min.js'></script>	
<script src="script/menu.js"></script>	
	
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<script src=”http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js”></script>
<![endif]-->
	
</head>
	
<body>

  <header>
	<a href="index.php"><img src="images/Logo.png" alt="Portland Tours Logo"></a>
    <h1>Welcome to Portland</h1>
  </header>
	
<?php require_once ('includes/nav.php'); ?>
	
  <section>
    <article>
      <h2>If you have any question, please contact us.</h2>
		<form id="form1" name="form1" method="post" action="contact_add_action.php">
			<label for="Name">*Name:</label>
			<input type="text" name="name" id="name" required="required" placeholder="your name">
			<label for="myEmail">*E-mail address:</label>
			<input type="email" name="email" id="email" required="required" placeholder="your email">
			<label for="Subject">*Subject</label>
			<input type="text" name="subject" id="subject" required="required" placeholder="your subject">
			<label for="Message">*Message:</label>
			<textarea name="message" id="message" required="required" placeholder="your message"></textarea>
			<input type="image" src="images/button.jpg" alt="Submit">
		</form>
		
		<script>document.getElementById('form1').elements[0].focus();</script>
    </article>
  
     <?php require_once ('includes/aside.php'); ?>
  
  </section>
	
  <footer>Call: 971-722-5695 <br>
	      Address: Cascade Campus, TEB 206, Portland Community College<br>
	 	  Copyright @ 2017 Portland Historical Tours<br>
  </footer>
	
</body>
	
</html>
