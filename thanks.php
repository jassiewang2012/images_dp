<?php session_start(); ?> 
<?php
 include 'header.php';
 require 'db_connect.php';
 
 $sql = "SELECT cata_name FROM IM_Cata WHERE cata_id='" . $_SESSION['user_cata'] . "'";
$result = mysql_query($sql);
$record = mysql_fetch_assoc($result);

 
 if($_SESSION['file']){
 $to      = 'stacy.cullotta@lgh-usa.com';
$subject = 'Request Images of '.$record['cata_name'];

$message = '<html><body>';
$message .= '<img src="http://lgh-usa.com/images_dp/LGHLogoSignature.jpg" alt="LGH logo" />';
$message .= '<table style="border-color: #666;" cellpadding="10">';
$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $_POST['firstname'] . " ".$_POST['lastname']."</td></tr>";
/**$message .= "<tr><td><strong>Company:</strong> </td><td>" . $_POST['company']. "</td></tr>";
$message .= "<tr><td><strong>Phone:</strong> </td><td>" . $_POST['phone'] . "</td></tr>";
$message .= "<tr><td><strong>Address:</strong> </td><td>" . $_POST['address'] . "</td></tr>";
$message .= "<tr><td><strong>City:</strong> </td><td>" .$_POST['city'] . "</td></tr>";
$message .= "<tr><td><strong>State:</strong> </td><td>" .$_POST['state'] . "</td></tr>";
$message .= "<tr><td><strong>ZIP:</strong> </td><td>" .$_POST['Zip'] . "</td></tr></table>";**/
$message .= "</table>";
$message .= "<br/><br/><h3>Pictures are requested:</h3>";

$message .= '<table style="border-color: #666;" cellpadding="10">';
$message .= "<tr style='background: #eee;'><td><strong>Images</strong> </td><td><strong>Download</strong> </td><td><strong>Print</strong> </td></tr>";

foreach ($_SESSION['file'] as $key => $value){
    if($value['download']){
        if($value['print']){
            $message .= "<tr><td><strong>".$key."</strong> </td><td>Yes</td><td>Yes</td></tr>";
        }else{
            $message .= "<tr><td><strong>".$key."</strong> </td><td>Yes</td><td></td></tr>";
        }
    }else{
        if($value['print']){
            $message .= "<tr><td><strong>".$key."</strong> </td><td></td><td>Yes</td></tr>";
        }
    }
}




/***if (($addURLS) != '') {
    $message .= "<tr><td><strong>URL To Change (additional):</strong> </td><td>" . strip_tags($addURLS) . "</td></tr>";
}
$curText = htmlentities($_POST['curText']);           
if (($curText) != '') {
    $message .= "<tr><td><strong>CURRENT Content:</strong> </td><td>" . $curText . "</td></tr>";
}
$message .= "<tr><td><strong>NEW Content:</strong> </td><td>" . htmlentities($_POST['newText']) . "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";**/

/**$message = "Name: ".$_POST['firstname']." ".$_POST['lastname']."\r\n";
$message .= "Company: " .$_POST['company']. "\r\n";
$message .= "Phone: ".$_POST['phone']."\r\n";
$message .= "Adress: ".$_POST['address']."\r\n";
$message .= "City: ".$_POST['city']."\r\n";
$message .= "State: ".$_POST['state']."\r\n";
$message .= "Zip: ".$_POST['Zip']."\r\n\r\n\r\n";**/

        
//var_dump($message);

$headers = "From: "  .$_POST['email'] . "\r\n";
$headers .= "Reply-To: ". $_POST['email']  . "\r\n";
$headers .= "CC: ".$_POST['email']."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

/**$headers = 'From: '.$_POST['email'] . "\r\n" .
    'Reply-To: '.$_POST['email'] . "\r\n" .
    'X-Mailer: PHP/' . phpversion();**/

mail($to, $subject, $message, $headers);

 }
 ?>
<section id="one" class="wrapper style1">
     <header class="major">
             <h2><?php echo $record['cata_name'];?> </h2>	
             <p>Thank you for your order. Your photos will be sent to you shortly.</p>
     </header>		
				
			</section>


 <?php

session_destroy(); 
  include 'footer.php';
 ?>
