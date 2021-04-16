<!DOCTYPE html>
<html>
    <head>
        <title>Change Paswword</title>
    </head>
    <body>
        <?php

            session_start();          
            $userid = $_SESSION['user'];

            $emptyerr = $passerr = "";


            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Change Password") {

                $pass = $_POST['pass'];

                if(empty($_POST['pass']) || empty($_POST['cpass'])) {
                    $emptyerr = "Please Fill up the form properly!";
                }

                else if($_POST['pass'] != $_POST['cpass']) {
                    $passerr="Password doesn't Match";
                }

                else if(strlen($_POST['pass']) <= 7) {
                    $passerr="Password Must be minimum 8 character!";
                }
                else {
                    
                    $hostname = "localhost";
                    $dbusername = "toxin";
                    $dbpassword = "asdf54321";
                    $dbname = "deliverydatabase";
                    $conn = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);

                    $sql2 = "update login set Password = '".$pass."' where Username = '".$userid."'";
		            $res2 = $conn->query($sql2);
                    header("Location: Dashboard.php");
                }
            }
        ?>
        
        <h3>Change Password!</h3>
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <label>Hello <br> Enter Your new Password! </label> <br>

            <label for="password">Password:</label>
            <input type="password" name="pass" id="password">

            <br>

            <label for="cpassword">Confirm Password:</label>
            <input type="password" name="cpass" id="cpassword">

            <?php echo $passerr; ?>
            <br>
            <?php echo $emptyerr; ?>
            <br>

            <input type="submit" value="Change Password" name="button">
            
        </form>

        <br>
         
    </body>
</html>