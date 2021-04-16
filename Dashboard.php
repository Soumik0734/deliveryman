<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
    </head>
    <body>
        <?php 
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Profile") {
                header('Location: profile.php');
            }
            
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Account") {
                header('Location: account.php');
            }

           if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "View Delivery") {            
                header('Location: viewdeliverylist.php');
            }

            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Delivery History") {
                header('Location: viewdeliveryhistory.php');
            }
            
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Leave Application") {
                header('Location: leaveapplication.php');
            }
            
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Change Password") {
                header('Location: changepass.php');
            }

            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Logout") {
                unset($_SESSION['user']);
                header('Location: login.php');
            }
        ?>
        
        <h1 >Digital E-Book</h1>
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

        

            <fieldset>
                <legend><b>Profile</b></legend>
                
                <input type="submit" value="Profile" name="button"> <br>

                <input type="submit" value="Account" name="button"> <br>
                
                <input type="submit" value="View Delivery" name="button"> <br>
                
                <input type="submit" value="Delivery History" name="button"> <br>
                
                <input type="submit" value="Leave Application" name="button"> <br> 

                <input type="submit" value="Change Password" name="button"> <br>
            
                <input type="submit" value="Logout" name="button"> 
            
			</fieldset>
        </form>
        
    </body>
</html>