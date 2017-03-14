<!DOCTYPE html>

<html lang="en">
	
<head>
	
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="author" content="Guohong Chen">
	
<title>Book a Reservation | Portland Historical Tours</title>	
	
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
      <h2>Book a Reservation</h2>
		
		<form id="form1" name="form1" method="post" action="reservation_add_action.php">
			<label for="tour">*Choose your tour</label>
			<select size="1" name="tour" id="tour" required="required">
				<option value="">Choose one</option>
				<option value="downtown">Downtown Tour</option>
				<option value="landmarks">Landmarks Tour</option>
				<option value="growth">Growth Tour</option>
			</select>
			<label for="myFName">*First Name:</label>
			<input type="text" name="firstname" id="firstname" required="required" placeholder="your first name">
			<label for="myLName">*Last Name:</label>
			<input type="text" name="lastname" id="lastname" required="required" placeholder="your last name">
			<label for="myEmail">*E-mail:</label>
			<input type="email" name="email" id="email" required="required" placeholder="your email">
			<label for="myPhone">*Phone</label>
			<input type="tel" name="phone" id="phone" required="required" placeholder="your phone">
			<label for="Tdate">*Tour date:</label>
			<input type="date" name="tdate" id="tdate" required="required" placeholder="YYYY-MM-DD">
			<label for="Participants">*Total Participants:</label>
			<input type="number" name="participants" id="participants" min="1" max="99" required="required" placeholder="participants">
			<label for="Comments">*Does anyone in your party have food or drink sensitivities? If so, what are they?:</label>
			<textarea name="comments" id="comments" required="required" placeholder="your comments"></textarea>
			<input type="image" src="images/button.jpg" alt="Submit">
		</form>
            
    </article>
   
     <?php require_once ('includes/aside.php'); ?>
   
  </section>
	
  <footer>Call: 971-722-5695 <br>
	      Address: Cascade Campus, TEB 206, Portland Community College<br>
	 	  Copyright @ 2017 Portland Historical Tours<br>
  </footer>
	
</body>
	
</html>
