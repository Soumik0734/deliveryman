<!DOCTYPE html>
<html>
    <head>
        <title>Account</title>
    </head>
    <body>
        <?php 

        $invalidammount= "";
        $balance= "";
        
        session_start();
        $userid = $_SESSION['user'];


        $hostname = "localhost";
        $dbusername = "toxin";
        $dbpassword = "asdf54321";
        $dbname = "deliverydatabase";
        $conn = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);
        $conn1 = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);

        $sql1 = "select *  from account where Email = '".$userid."'";
		$res1 = $conn->query($sql1);

		if($res1->num_rows > 0) {
			while($row = $res1->fetch_assoc()) {
				$balance = $row['Balance'];       
			}
        }
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Withdraw Money") {
                $withdrawbal = $_POST['withdraw'];
                if(empty($withdrawbal)){
                    $invalidammount= "Enter a value!";
                }
                else if($withdrawbal>$balance){
                    $invalidammount= "Insufficient Balance!";
                }
                else{
                    $carry= $balance - $withdrawbal;
                    echo $carry;
                    echo $userid;

                    $sql2 = "update account set Balance = ".$carry." where Email = '".$userid."'";
		            $res2 = $conn1->query($sql2);
                    header('Location: account.php');
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
        
        <h1 >Digital E-Book</h1>
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

            <input type="submit" value="Dashboard" name= "button">
            <input type="submit" value="Logout" name= "button">

        

            <fieldset>
                <legend><b>Account</b></legend>

                <label for="balance">Balance:</label>
                <?php echo $balance ?>
                <br>

                <label for="withdraw">Withdraw Ammount:</label>
                <input type="text" name="withdraw">                                
                <input type="submit" value="Withdraw Money" name="button"> <br>
                <?php echo $invalidammount?>
            
			</fieldset>
        </form>
        
    </body>
</html>