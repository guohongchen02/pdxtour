
<title><?php echo $heading; ?></title>

<link rel = "stylesheet" href = "<?php echo $styles_path . '/' . $styles_page; ?>"> 

</head>

<body>

<?php

$file_name = basename($_SERVER["SCRIPT_NAME"]); 

if ((strpos($file_name, "login") == false) && isset($_SESSION["loggedin"])){

	echo "<nav>";
	
	echo "<br>";
	
    echo "Logged in as: <b>{$_SESSION["username"]} ({$_SESSION["permissions"]})</b>";
	
	echo "<p>";
	
	
	
if($_SESSION["permissions"]=="admin"){ 
	
	echo "<a href= '{$link_1_page}'> {$link_1_text} </a> | "; 
	echo "<a href= '{$link_2_page}'> {$link_2_text} </a> | "; 
	echo "<a href= '{$link_3_page}'> {$link_3_text} </a> | "; 
    echo "<a href= '{$link_4_page}'> {$link_4_text} </a> | "; 

} 
	
	echo "<a href= '{$link_5_page}'> {$link_5_text} </a>"; 
	
	echo "</p>";
	
	echo "</nav>";
	
}

?>