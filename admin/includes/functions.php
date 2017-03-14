<?php

function multi_select_box1($field_name1, $field_name2, $field_name3, $field_name4, $field_name5, $field_name6, $field_name7, $field_name8, $field_name9, $result){


$options="\n<select name='$field_name1'>\n<option value=''>Select a record</option>"; 

     while($rows = $result->fetch(PDO::FETCH_ASSOC)) {

		 $id=$rows["id"];
		 $tour=$rows["tour"];
		 $firstname=$rows["firstname"];
		 $lastname=$rows["lastname"];
		 $email=$rows["email"];
		 $phone=$rows["phone"];
		 $tdate=$rows["tdate"];
		 $participants=$rows["participants"];
		 $comments=$rows["comments"];
		 
		 
      $options.="\n<option value=" . $id . ">" . $id . " | " . $tour . " | " . $firstname . " | " . $lastname . " | " . $email . " | " . $phone . " | " . $tdate . " | " . $participants . " | " . $comments . "</option>"; 
      
} 

$options.= "\n</select>\n";
return "$options";

}



function multi_select_box2($field_name1, $field_name2, $field_name3, $field_name4, $field_name5, $result){


$options="\n<select name='$field_name1'>\n<option value=''>Select a record</option>"; 

     while($rows = $result->fetch(PDO::FETCH_ASSOC)) {

      $id=$rows["id"];
      $name=$rows["name"]; 
      $email=$rows["email"];
	  $subject=$rows["subject"];
	  $message=$rows["message"];

      $options.="\n<option value=" . $id . ">" . $id . " | " . $name . " | " . $email . " | " . $subject . " | " . $message . "</option>"; 
      
} 

$options.= "\n</select>\n";
return "$options";

}

function check_submitted($field_name, $field_type, &$missing_count) {

    if(!isset($_POST[$field_name])) { 
    
          $_POST[$field_name]=""; // set a default value if no value was submitted, to prevent errors
          
          if($field_type <> "checkbox") { // checkboxes usually don't have to be checked
               echo "Missing data for <strong>" . $field_name . "</strong>.<br />";
               $missing_count++;
          }
          
    }
    
    // For text, textarea, and select check for present but empty
    // Note use of elseif instead of if, which means only one of the 'if' blocks will run, not both.
    elseif($field_type == "text" || $field_type == "textarea" || $field_type == "select") { 
    
         if(trim($_POST[$field_name]) == "") {

              echo "Missing data for <strong>" . $field_name . "</strong>.<br />";
              $missing_count++;
    
         } // end if($_POST...)
         
    } // end if($field_type...)

} // end function 

function sanitize($field_name, $field_type, &$field_value) {

    if($field_type == "text" || $field_type == "textarea") {
     
         $field_value = trim($field_value);
         $field_value = stripslashes(strip_tags($field_value)); // strip html tags and back slashes
         $field_value = addslashes($field_value); // escapes quote marks so they will work in SQL statements
         $_POST[$field_name] = str_replace("/","",$field_value); // removes forward slashes
         
    }
     
}

function display_data() {

     echo "<h3><em>Thank you for filling out the form!<br />You submitted the following information:</em></h3><br />";

     foreach ($_POST as $key => $value) {
     
          echo $key . ": <strong>" . $value . "</strong><br /><br />";
          
     }

}

?>