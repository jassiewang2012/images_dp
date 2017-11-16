<?php
session_start();
include 'header.php';
require 'db_connect.php';

if ($_SESSION['signed_in']) {



    $sql = "SELECT cata_name FROM IM_Cata WHERE cata_id='" . $_SESSION['user_cata'] . "'";
    $result = mysql_query($sql);
    $record = mysql_fetch_assoc($result);
    $folder = '' . $record['cata_name'] . '/';
     $folder_h = '' . $record['cata_name'] . '_h/';
    $filetype = '*.jpg';
    $files = glob($folder . $filetype);
    $files_h = glob($folder_h . $filetype);
    $count = count($files);
  
    ?>
    <section id="one" class="wrapper style1">
        <header class="major">
            <h2><?php echo $record['cata_name']; ?></h2>
            <p>Please choose the photos you would like to download.</p>
         
        </header>
        <div class="container">
            <form method='post' action="review.php">
                 <!--  <input type='submit' value='Submit'>-->
                   <br/>
                   <br/>
                <?php for ($i = 0; $i < $count; $i++) { ?>
                    <div class="row">
                        <div class="4u">
                            <section class="special box">
                                <img src="<?php echo $files[$i]; ?>" data-big="<?php echo $files_h[$i]; ?>"/>
                                <?php $filename[$i] = substr($files[$i], strlen($folder), strpos($files[$i], '.') - strlen($folder)); ?>
                                <h3><?php echo $filename[$i]; ?></h3>
                                   <strong>Click the picture to see it clearly.</strong>
                                <?php
                               echo '<label><a href="'.$files_h[$i].'" download="'.$filename[$i].'" >Download</a><!--<input id="download" type="checkbox" name="filename[' . $filename[$i] . '][download]"></label>-->';
                              //  echo '<label>Print<input id="print" type="checkbox" name="filename[' . $filename[$i] . '][print]"></label>';
                                $i++;
                                ?>
                            </section>
                        </div>
                        <div class="4u">
                            <section class="special box">
                              <img src="<?php echo $files[$i]; ?>" data-big="<?php echo $files_h[$i]; ?>"/>
                                <?php $filename[$i] = substr($files[$i], strlen($folder), strpos($files[$i], '.') - strlen($folder)); ?>
                                <h3><?php echo $filename[$i]; ?></h3>
                                   <strong>Click the picture to see it clearly.</strong>
                                <?php
                                  echo '<label><a href="'.$files_h[$i].'" download="'.$filename[$i].'" >Download</a><!--<input id="download" type="checkbox" name="filename[' . $filename[$i] . '][download]"></label>-->';
                              //  echo '<label>Print<input id="print" type="checkbox" name="filename[' . $filename[$i] . '][print]"></label>';
                                $i++;
                                ?>
                            </section>
                        </div>
                        <div class="4u">
                            <section class="special box">
                           <img src="<?php echo $files[$i]; ?>" data-big="<?php echo $files_h[$i]; ?>"/>
                                <?php $filename[$i] = substr($files[$i], strlen($folder), strpos($files[$i], '.') - strlen($folder)); ?>
                                <h3><?php echo $filename[$i]; ?></h3>
                                   <strong>Click the picture to see it clearly.</strong>
                                <?php
                             echo '<label><a href="'.$files_h[$i].'" download="'.$filename[$i].'" >Download</a><!--<input id="download" type="checkbox" name="filename[' . $filename[$i] . '][download]"></label>-->';
                              //  echo '<label>Print<input id="print" type="checkbox" name="filename[' . $filename[$i] . '][print]"></label>';
                               
                                ?>
                            </section>
                        </div>
                    </div><?php } ?>
             
            </form>

        </div>
    </section>


    <!--<table>
        <th>
        <td>
            Image
        </td>
        <td>
            Image name
        </td>
        <td>
            Download
        </td>
        <td>
            Print
        </td>
    </th>
    <?php
    for ($i = 0; $i < $count; $i++) {
        echo '<tr><td>';
        echo '<a name="' . $i . '" href="#' . $i . '"><img src="' . $files[$i] . '" /></a></td>';
        $filename[$i] = substr($files[$i], strlen($folder), strpos($files[$i], '.') - strlen($folder));
        echo '<td>' . $filename[$i] . '</td>';
        echo '<td><input id="download" type="checkbox" name="filename[' . $filename[$i] . '][download]"></td>';
        echo '<td><input id="print" type="checkbox" name="filename[' . $filename[$i] . '][print]"></td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>

    <input type='submit' value='Submit'>
    </form>-->

    <?php
} else {
    echo 'Please login at <a href="index.php">here</a>.';
}


?>