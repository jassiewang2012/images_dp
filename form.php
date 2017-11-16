<?php session_start(); ?> 
<?php
 include 'header.php';
 require 'db_connect.php';
 
 if($_SESSION['signed_in']){
     
 
  $sql = "SELECT cata_name FROM IM_Cata WHERE cata_id='" . $_SESSION['user_cata'] . "'";
$result = mysql_query($sql);
$record = mysql_fetch_assoc($result);

 //add Print images information to the database
$i=0;
 foreach($_POST['filename'] as $key => $value){
     $file=$key ;   
     
           $sql="SELECT * FROM IM_images WHERE image_name='".$file."'";
           $result = mysql_query($sql);
      $record = mysql_fetch_assoc($result);
     if($value['download']){
         $_SESSION['file'][$file]['download']=$value['download'];
     }
     if($value['print']){
         $_SESSION['file'][$file]['print']=$value['print'];
         if($record){
             $record['print_t']=$record['print_t']+1;
              $sql = "UPDATE IM_images SET
                      print_t='" . $record['print_t']. "',
                      image_update=NOW()
                      WHERE image_name='" . $file . "'";
                   $result = mysql_query($sql);    
           
         }else{
              $sql = "INSERT INTO
                    IM_images(image_name, image_cata, print_t,image_update)
                VALUES('" . $file . "',
                       '" . $_SESSION['user_cata']. "',
                       '1',
                        NOW())";
                         
        $result = mysql_query($sql);
        
         }
     }
 }
 
 
 ?>

<section id="one" class="wrapper style1">	
				<div class="container">
					<div class="row">
						<div class="6u">
							<section class="special box">
                                                            <h2>Please file your information.</h2>	
							<form method="POST" action="thanks.php">
<input placeholder="Enter your first name" type="text" name="firstname"><br>
<!--<input  placeholder="Enter your last name" type="text" name="lastname"><br>
<input placeholder="Enter your company name" type="text" name="company"><br>
<input placeholder="Enter your address" type="text" name="address"><br>
<input placeholder="Enter your city" type="text" name="city"><br>
<input  placeholder="Enter your state" type="text" name="state"><br>
<input  placeholder="Enter your zip" type="text" name="Zip"><br>-->
<input placeholder="Enter your Email *" type="email" required="required"  name="email"><br/>
<!--<input type="text" placeholder="Enter your phone * " required="required"  name="phone">-->
<br/>
<input type='submit' value='Submit'>
</form>
							</section>
						</div>
						
					</div>
				</div>
			</section>

 <?php
 }else{
    echo 'Please login at <a href="index.php">here</a>.';
}
  include 'footer.php';
 ?>
  
			