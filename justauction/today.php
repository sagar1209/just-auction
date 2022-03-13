<?php
 
// Username is root
$user = 'root';
$password = '';
 
// Database name is gfg
$database = 'ja';
 
// Server is localhost with
//port number 2000


$servername='localhost';
$mysqli = new mysqli($servername, $user,
                $password, $database);
 
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}



//$username = $_SESSION['username'];
// $sql = "Select * from registration where username='$username' AND password='$password'";
// SQL query to select data from database

$startDate = date("2021-11-18");
$endDate = date("2021-11-18");
$sql ="SELECT productimage,productname, baseprice FROM productinformation
    WHERE biddate
    BETWEEN '$startDate 00:00:00' AND '$endDate 23:59:59'";

    

$result = $mysqli->query($sql);
$mysqli->close();
?>
<?php   // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
             ?>
           
            <tr>
                <!--FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN-->
                
                
                <td><img src="<?php echo "upload/".$rows['productimage'];?>" width="100" height="100" alt="Image"></td>
                <td><?php echo $rows['productname'];?></td>
                <td><?php echo $rows['baseprice'];?></td>
                
               
            </tr>
               
            <?php
                }
             ?>
