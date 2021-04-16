<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
    </head>
    <body>
    
    <?php
 
        session_start();
        $userid = $_SESSION['user'];


        $hostname = "localhost";
        $dbusername = "toxin";
        $dbpassword = "asdf54321";
        $dbname = "deliverydatabase";
        $conn = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);

        $sql = "select *  from profile where Email = '".$userid."'";
		$res1 = $conn->query($sql);

		if($res1->num_rows > 0) {
			while($row = $res1->fetch_assoc()) {
				$firstname = $row['Firstname'];
                $lastname = $row['Lastname'];
                $gender = $row['Gender'];
                $email = $row['Email'];
                $image = $row['Image'];
			}
		}
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Logout") {
                unset($_SESSION['user']); 
                header('Location: login.php');
            }
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Dashboard") {
                header('Location: Dashboard.php');
            }
        ?>
        
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <input type="submit" value="Dashboard" name= "button">
            <input type="submit" value="Logout" name= "button">
        </form>

            <fieldset>
                <legend><b>Profile:</b></legend>

                <?php echo '<img src="image/'.$image.'" alt="Image" width="100" height="130">' ?>

                <br>
            
                <label for="firstname">First Name:</label>
                <?php echo $firstname; ?>

                <br>

                <label for="lastname"> LastName:</label>
                <?php echo $lastname; ?>

                <br>

                <label for="gender">Gender:  </label>
                <?php echo $gender; ?>

                <br>

                <label for="email">Email:</label>
                <?php echo $email; ?>

            </fieldset>
        
    </body>
</html>