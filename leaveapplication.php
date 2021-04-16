<!DOCTYPE html>
<html>
<head>
  <title>Leave Application</title>
</head>
<body>
<?php
        session_start();
        $userid = $_SESSION['user'];
        $emptyerr="";

        $hostname = "localhost";
        $dbusername = "toxin";
        $dbpassword = "asdf54321";
        $dbname = "deliverydatabase";
        $conn = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);

        if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Submit") {

          $text= $_POST['textname'];

          if(empty($_POST['textname'])) {                    
              $emptyerr = "Please Fill up the Box!";
          }

          else{
            $sql = "INSERT INTO application (Email, application)
            VALUES ('".$userid."', '".$text."')";
            $res = mysqli_query($conn, $sql);
            header('Location: Dashboard.php');

            
          }
        }
        if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Logout") {
          unset($_SESSION['user']); 
          header('Location: login.php');
      }
?>

<h1>Leave Application</h1>

<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
  
  <input type="text" name="textname" row="20" col="15" >
  
  <?php echo $emptyerr?>
  <br><input type="submit" value="Submit" name="button">
  <br>
            
  <input type="submit" value="Logout" name="button"> 
</form>


<p></p>

</body>
</html>
