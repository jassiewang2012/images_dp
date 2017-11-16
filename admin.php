<?php session_start();
include 'header.php';
 require 'db_connect.php';
 
if($_SESSION['signed_in']){
  $sql='SELECT * FROM IM_images JOIN IM_Cata WHERE cata_id=image_cata AND print_t>0 ORDER BY image_cata';
  $result = mysql_query($sql);
 $number=mysql_num_rows($result);
    ?>

<section id="one" class="wrapper style1">
     		<div class="container">
					<div class="row">
						<div class="6u">
							<section class="special box">
                                                             <h2>Photos need to be printed.</h2>	
						<?php echo '<table style="border-color: #666;" cellpadding="10"><tr style="background: #eee;"><td>Photo Name</td><td>How many need to be printed?</td><td>Which Event?</td></tr>';
if($number){
 while($row = mysql_fetch_assoc($result))
                {               
                    echo '<tr><td>';
                       echo $row['image_name'].'</td><td>'.$row['print_t'].'</td><td>'.$row['cata_name'].'</td>'; 
                    echo '</tr>';
                }
                
                }
                echo '</table>';

                ?>
							</section>
						</div>
						
					</div>
				</div>
			</section>
<button class="button big special" onclick="alert_clean()">Ready to clear all the request? </button>
<br/><br/>
<a href='dataclean.php' id="test_link"></a>

<script>
    function alert_clean(){
        var cleanMsg=document.getElementById("test_link");
                cleanMsg.innerHTML ="Click here";
                
    }
    </script>
    
<?php
}else{
      echo 'Please login at <a href="index.php">here</a>.';
}

include 'footer.php';

?>
