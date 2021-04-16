<!DOCTYPE html>
<html>
    <head>
        <title>Login Form</title>
    </head>
    <body>
        <?php

            $username = $password ="";
            $usernameerr = $passworderr = $loginfail ="";

            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Login") {

                if(empty($_POST['uname'])) {                    
                    $usernameerr = "Please Fill up the Username!";
                }

                else if(empty($_POST['pass'])) {                    
                    $passworderr = "Please Fill up the password!";
                }

                else {
                    $username = $_POST['uname'];
                    $password = $_POST['pass'];

                    $hostname = "localhost";
                    $dbusername = "toxin";
                    $dbpassword = "asdf54321";
                    $dbname = "deliverydatabase";
                    $conn = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);

                    $sql = "select * from login where Username = '".$username."' and Password = '".$password."'";
                    $res = mysqli_query($conn, $sql);

                    if($res->num_rows > 0) {

                        session_start();
                        $_SESSION['user'] = $username;
                        header("Location: Dashboard.php");
                    }
                    else{
                        $loginfail = "Wrong Password! Please Try Again.";
                    }
                }
            }
        ?>
        
        <h1>Welcome to Digital E-Book Delivery Point</h1>
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

            <fieldset>
                <legend><b>Login</b></legend>
            
                <label for="username">Username:</label>
                <input type="text" name="uname" id="username">
                <?php echo $usernameerr; ?>

                <br>

                <label for="parmanent_address">Password:</label>
                <input type="password" name="pass" id="password">
                <?php echo $passworderr; ?>
				
				<br><br>

                <a href="forget_pass.php"> Forgotten Password? </a>
                
                </fieldset>

                <?php echo $loginfail; ?>

                <br>
                
            <input type="submit" value="Login" name="button"> 
        </form>      
    </body>
</html>