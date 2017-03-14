<!DOCTYPE html>

<html lang="en">
	
<head>
	
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="author" content="Guohong Chen">
	
<title>Portland Tours | Portland Historical Tours</title>	
	
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
		
      <h2>Beautiful Portland</h2>
		
		<figure>
			<figure class="mySlides">
				<a href="downtown.php"><img src="images/ds.png" alt="Downtown Tours"></a>
				<figure>Downtown Tours</figure>
			</figure>
			
			<figure class="mySlides">
				<a href="growth.php"><img src="images/gs.png" alt="Growth Tours"></a>
				<figure>Growth Tours</figure>
			</figure>
			
			<figure class="mySlides">
				<a href="landmarks.php"><img src="images/ls.png" alt="Landmarks Tours"></a>
				<figure>Landmarks Tours</figure>
			</figure>
			<figure>
 
			<span class="dot"></span> 
			<span class="dot"></span> 
			<span class="dot"></span> 
			</figure>
				<script src="script/slide.js"></script>
		</figure>

		
	</article>
 
     <?php require_once ('includes/aside_three.php'); ?>
   
  </section>
	
  <footer>Call: 971-722-5695 <br>
	      Address: Cascade Campus, TEB 206, Portland Community College<br>
	 	  Copyright @ 2017 Portland Historical Tours<br>
  </footer>
	
</body>
	
</html>
