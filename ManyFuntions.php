<?php

// REMOVE backslash from sentence
function cleanText($string){
$cleanedString = str_replace("\\", "", $string);
return $cleanedString;
}

// GET DIFFERENCE IN TIME
function dueEst($tdate){
 $datec = (string) date("d M Y H:i:s"); echo $datec."</br>";
 $startDate = new DateTime($tdate);
$endDate = new DateTime($datec); //new DateTime('09 Sep 2023 13:32:00');

$interval = $startDate->diff($endDate);
$daysInSeconds = $interval->days * 24 * 60 * 60; // Convert days to seconds
$hoursInSeconds = $interval->h * 60 * 60; // Convert hours to seconds
$minutesInSeconds = $interval->i * 60; // Convert minutes to seconds
$seconds = $interval->s; // Remaining seconds

$totalSeconds = $daysInSeconds + $hoursInSeconds + $minutesInSeconds + $seconds;
$totalMinutes = (int) $totalSeconds/60;
$totalHours = (int) $totalMinutes/60;
$totalDays = (int) $totalHours/24;
$totalWeeks = (int) $totalDays/7;
$totalMonths = $totalWeeks/4;
$totalYears = $totalMonths/12;
$dueNow = "";

if($totalSeconds < 60){
$dueNow = (int) $totalSeconds." sec";
} elseif($totalMinutes < 60){
$dueNow = (int) $totalMinutes." min";
}  elseif($totalHours < 24){
$dueNow = (int) $totalHours." hrs";
}  elseif($totalDays < 7){
$dueNow = (int) $totalDays." days";
}  elseif($totalWeeks < 4){
$dueNow = (int) $totalWeeks." wks";
}  elseif($totalMonths < 12){ 
$dueNow = (int) $totalMonths." months";
}  elseif($totalYears >= 1){
$dueNow = (int) $totalYears." yrs";
}
return $dueNow;
} 

// SEMDING EMAIL TO USERS

function sendMail(){
		
$to = $rz->email; // Replace with the recipient's email address
$email = "yourname@example.com";
$subject = "NEW UPDATE";
$message = "Hallo there, we have a new update kindly check it out.";  
$from_name = 'sitename'; // Replace with the desired "From" name
$from_email = 'title@sitename.com'; // Replace with the sender's email address
// setting headers
$headers = 'From: ' . $from_name . ' <' . $from_email . '>' . "\r\n";

// Send the email using wp_mail()
$mail_sent = wp_mail($to, $subject, $message, $headers);
	
}


// SELECTING AN OPTION IN A SELECT TAG USING PHP PREVIOUSLY SELECTED IN DATABASE
function selectedOption($one, $two, $three){
	$v = "";
	if($one == $two){
		$v = $three;
	}
	return $v;
}

?>
