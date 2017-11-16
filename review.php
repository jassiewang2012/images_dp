<?php
session_start();
include 'header.php';
require 'db_connect.php';

if ($_SESSION['signed_in']) {


    $sql = "SELECT cata_name FROM IM_Cata WHERE cata_id='" . $_SESSION['user_cata'] . "'";
    $result = mysql_query($sql);
    $record = mysql_fetch_assoc($result);
    $folder = '' . $record['cata_name'] . '/';
    ?>
    <section id="one" class="wrapper style1">
        <header class="major">
            <h2><?php echo $record['cata_name']; ?></h2>
            <p>Please confirm the photos you are requesting.</p>
        </header>
        <div class="container">
            <form method='post' action="form.php">
                <?php
                foreach ($_POST['filename'] AS $key => $value) {
                    $keys[] = $key;
                    $values[] = $value;
                }
                $count = count($keys);
                for ($i = 0; $i < $count; $i++) {
                    ?>
                    <div class="row">
                        <div class="4u">
                            <section class="special box">
                                <img src="<?php echo './' . $folder . $keys[$i] . '.jpg'; ?>" data-big="<?php echo './' . '' . $record['cata_name'] . '_h/'. $keys[$i] . '.jpg'; ?>"/>
                                <h3><?php echo $keys[$i]; ?></h3>
                                <?php
                                if ($values[$i]['download']) {
                                    echo '<label>Download<input id="download" type="checkbox" name="filename[' . $keys[$i] . '][download]" checked></label>';
                                } else {
                                    echo '<label>Download<input id="download" type="checkbox" name="filename[' . $keys[$i] . '][download]"></label>';
                                }

                                if ($values[$i]['print']) {
                                  echo '<label>Print<input id="print" type="checkbox" name="filename[' . $keys[$i] . '][print]" checked></label>';
                                } else {
                                   echo '<label>Print<input id="print" type="checkbox" name="filename[' . $keys[$i] . '][print]"></label>';
                                }
                                $i++;
                                ?>
                            </section>
                        </div>
                        <div class="4u">
                            <section class="special box">
                                <img src="<?php echo './' . $folder . $keys[$i] . '.jpg'; ?>" />
                                <h3><?php echo $keys[$i]; ?></h3>
                                 <?php
                                if ($values[$i]['download']) {
                                    echo '<label>Download<input id="download" type="checkbox" name="filename[' . $keys[$i] . '][download]" checked></label>';
                                } else {
                                    echo '<label>Download<input id="download" type="checkbox" name="filename[' . $keys[$i] . '][download]"></label>';
                                }

                                if ($values[$i]['print']) {
                                  echo '<label>Download<input id="download" type="checkbox" name="filename[' . $keys[$i] . '][print]" checked></label>';
                                } else {
                                   echo '<label>Download<input id="download" type="checkbox" name="filename[' . $keys[$i] . '][print]"></label>';
                                }
                                $i++;
                                ?>
                            </section>
                        </div>
                        <div class="4u">
                            <section class="special box">
                                <img src="<?php echo './' . $folder . $keys[$i] . '.jpg'; ?>" />
                                <h3><?php echo $keys[$i]; ?></h3>
                                 <?php
                                if ($values[$i]['download']) {
                                    echo '<label>Download<input id="download" type="checkbox" name="filename[' . $keys[$i] . '][download]" checked></label>';
                                } else {
                                    echo '<label>Download<input id="download" type="checkbox" name="filename[' . $keys[$i] . '][download]"></label>';
                                }

                                if ($values[$i]['print']) {
                                  echo '<label>Download<input id="download" type="checkbox" name="filename[' . $keys[$i] . '][print]" checked></label>';
                                } else {
                                   echo '<label>Download<input id="download" type="checkbox" name="filename[' . $keys[$i] . '][print]"></label>';
                                }
                                $i++;
                                ?>
                            </section>
                        </div>
                    </div><?php } ?>
                 <input type='submit' value='Ready to Go'>
                 <br/>
                 <br/>
              <a href="image.php">Go Back to Select again.</a>
    </form>

        </div>
    </section>


    <?php
} else {
    echo 'Please login at <a href="index.php">here</a>.';
}
include 'footer.php';
?>
