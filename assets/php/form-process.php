<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// ADDITIONAL GUESTS
if (!empty($_POST["guests"])) {
    $guests = $_POST["guests"];
} else {
    $song = "No additional guests";
}

// ACCOMODATION
if (empty($_POST["accomodation"])) {
    $errorMSG .= "Accomodation choice is required ";
} else {
    $accomodation = $_POST["accomodation"];
}

// SONG
if (!empty($_POST["song"])) {
    $song = $_POST["song"];
} else {
    $song = "No song chosen";
}

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}

$EmailTo = "jesshugill2@gmail.com";
$Subject = "Wedding RSVP";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Subject: ";
$Body .= $msg_subject;
$Body .= "\n";
$Body .= "Additional guests?: ";
$Body .= $guests;
$Body .= "\n";
$Body .= "Accomodation Request: ";
$Body .= $accomodation;
$Body .= "\n";
$Body .= "Song: ";
$Body .= $song;
$Body .= "\n";
$Body .= "Additional Message: ";
$Body .= $message;
$Body .= "\n";

// send email
//$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
$success = @mail($EmailTo, $Subject, $Body, "From:".$email);  
 
// redirect to success page
if ($success && $errorMSG == ""){
   //Set Refresh header using PHP.
    header( "refresh:5;url=http://www.sipsiphooray.co.uk/" );
 
   echo "RSVP submitted, you will be redirected to the home page.";
   
}else{
    if($errorMSG == ""){
        header( "refresh:5;url=http://www.sipsiphooray.co.uk/" );
        echo "Something went wrong :( Sam must have coded a crap website, redirecting to home page.";
    } else {
        header( "refresh:5;url=http://www.sipsiphooray.co.uk/" );
        echo "Something went wrong :( Sam must have coded a crap website, redirecting to home page.";
        echo $errorMSG;
    }
}

?>
