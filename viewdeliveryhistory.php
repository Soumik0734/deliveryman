<!DOCTYPE html>
<html>
    <head>
        <title>deliverylist</title>
    </head>
    <body>
        <?php
        
        session_start();          
        $userid = $_SESSION['user'];

            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Back") {
                header('Location: Dashboard.php');
            }
        ?>
        
        <h1 >Digital E-Book</h1>
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

        

            <fieldset>
                <legend><b>Delivery List</b></legend>
                
                <?php
                $hostname = "localhost";
                $dbusername = "toxin";
                $dbpassword = "asdf54321";
                $dbname = "deliverydatabase";
                $conn = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);



                $sql1 = "select * from delivery where dman = '".$userid."'";
		        $res1 = $conn->query($sql1);

		        if($res1->num_rows > 0) {
			        while($row = $res1->fetch_assoc()) {
				        echo "id: " . $row['orderid']."=> Person Name: " .$row['pname']."=> Order title: " .$row['otitle']."=> Quantity: " .$row['quantity']."=> Amount: " .$row['amount']."=> Phone no: " .$row['phnno']."=> Status: " .$row['status'];
				        echo "<br>";
			        }
		        }
                ?>                
                <input type="submit" value="Back" name="button"> <br>
            
			</fieldset>
        </form>
        
    </body>
</html>