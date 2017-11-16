<?php session_start(); ?> 
<?php
include 'header.php';
require 'db_connect.php';


if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    //echo login in form
    ?>
    <!-- login in form -->


    <section id="one" class="wrapper style1">

        <div class="container">
            <div class="row">
                <div class="6u">
                    <section class="special box">
                        <form method='post' action="">
                            Username: <input type="text" name="user_name"/>
                            Password: <input type="password" name="user_pw"/>
                            <br/>
                            <input type="submit" value="Submit"/>
                        </form>	
                    </section>
                </div>

            </div>
        </div>
    </section>



    <?php
} else {
    $errors = array();

    //forget user name

    if (empty($_POST['user_name'])) {
        $errors[] = 'The user name field cannot be empty. Please try again.';
    } elseif (empty($_POST['user_pw'])) {

        //forget password

        $errors[] = 'The password field cannot be empty. Please try again.';
    } else {
        $sql = "SELECT * FROM IM_users WHERE user_name='" . $_POST['user_name'] . "' AND user_pass='" . $_POST['user_pw'] . "'";
        $result = mysql_query($sql);
        $row = mysql_num_rows($result);
        if (!$row) {
            //username and password are not matched

            $errors[] = 'You have supplied a wrong user/password combination. Please try again.';
        } else {
            //set session

            $_SESSION['signed_in'] = true;
            while ($record = mysql_fetch_assoc($result)) {
                $_SESSION['user_name'] = $record['user_name'];
                $_SESSION['user_level'] = $record['user_level'];
                $_SESSION['user_cata'] = $record['user_cata'];
            }


            //Deicde whether it is normal user or admin
            if (!$_SESSION['user_level']) {
                include 'image.php';
            } else {
                echo ' Go to <a href="admin.php">admin page</a>.';
            }
        }
    }
          //echo error messages
    if (!empty($errors)) {
        echo '<br/><div class="row"><ul>';
        foreach ($errors as $key => $value) {
            echo '<li>' . $value . '</li>';
        }
        echo '</ul></div>';
        ?>
        <section id="one" class="wrapper style1">

            <div class="container">
                <div class="row">
                    <div class="6u">
                        <section class="special box">
                            <form method='post' action="">
                                Username: <input type="text" name="user_name"/>
                                Password: <input type="password" name="user_pw"/>
                                <br/>
                                <input type="submit" value="Submit"/>
                            </form>	
                        </section>
                    </div>

                </div>
            </div>
        </section>

        <?php
    }
}

include 'footer.php';
?>
 