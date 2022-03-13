<?php
 
// Username is root
$user = 'root';
$password = '';
 
// Database name is gfg
$database = 'ja';
 
// Server is localhost with
// port number 3308
$servername='localhost';
$mysqli = new mysqli($servername, $user,
                $password, $database);
 
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
session_start();

$username = $_SESSION['username'];
// $sql = "Select * from registration where username='$username' AND password='$password'";
// SQL query to select data from database
$sql = "SELECT productimage,productname, baseprice, productinformation FROM productinformation where username='$username'";
$result = $mysqli->query($sql);
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="Common.css">
    <link rel="stylesheet" href="8_AfterLoginMyAccount.css">
    <title>My Account</title>
</head>
<body>
    
<div class="SiteName">
    <img src="4.jpeg" alt="Auctionlogo" width="150" height="150">
    <div id="SiteName">
      <h1>
        Just Auction
      </h1>
    </div>
  </div>
  <div class="buttons">
    <a href="3_HomePage.php" class="button">
      Home
    </a>
    <a href="8_AfterLoginMyAccount.php" class="button">
      My account
    </a>
    <a href="14_Buyer.php" class="button">
      Buyer
    </a>
    <a href="15_Seller.php" class="button">
      Seller
    </a>
    <a href="16_LiveAuction.php" class="button">
      Live Auction
    </a>
    <a href="17_AboutUs.php" class="button">
      About us
    </a>
    <a href="10_feedbackform.php" class="button">
      Feed-back
    </a>
    <a href="video.mp4" class="button">
      Help
    </a>
    <div class="dropdownsecond">
      <button class="dropbtnsecond" style="
      margin-top: 13%;     font-family: none;">Category
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="AnotherDropDown" style="
      margin: -437%;
      margin-top: 20%;
  ">
      <div class="dropdown-contentsecond">
       
          <a href="18_Painting.php">Painting</a>
          <a href="19_VintageCar.php">Vintage Car</a>
          <a href="20_AntiquePot.php">Antique pot/flask</a>
          <a href="21_Artifacts.php">Artifacts</a>
       
      </div>
    </div>
    </div>



    <div class="dropdownsecond">
      <button class="dropbtnsecond">
        <div id="Profile">
          <img src="Profile3-modified.png" alt="Profile Pic" width="57" height="57">
        </div>
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-contentsecond">
        <a href="Log-Out.php" style="height: 4vh;">Log-Out</a>
      </div>
    </div>
  </div>
    
      <br>
      <br>

      <div id="MainName">
        <h2>
            <br>
            MY ACCOUNT PAGE
        </h2>
    </div>
    <br>
    <br>
       <div class="Details">
        <div>
            <label for="name">NAME : </label>
            <?php
              
             echo $_SESSION['name'];
            ?>

            <!-- <input type="text" name="name" id ="name"> -->
        </div>
       
        <br>
      
        <div>
            <label for="email">EMAIL :</label>
            <?php
         
              echo $_SESSION['email'];
            ?>
            <!-- <input type="email" name="email" id="email"> -->
        </div>
        <br>
        <div>
            <label for="contact">CONTACT:</label>
            <?php
           
              echo $_SESSION['c_number'];
            ?>
            <!-- <input type="text" name="contact" id="subject"> -->
        </div>
        <br>
        <br>

        <a href="22_ChangePassword.php">
        CLICK HERE TO CHANGE YOUR PASSWORD.
        </a>
        <br>
        <br>
        <a href="9_ProductInformation.php">
        CLICK HERE IF YOU WANT TO KEEP YOUR PRODUCT FOR BIDDING.
        </a>
        <br><br><br>
    
    
        <!-- <div>
            <label for="message">MESSAGE :</label><br>
            <textarea name="message" id="message" cols="50" rows="10"></textarea>
        </div>
        <br><br>
        <div>
            <input type="reset" value="RESET">
            <input type="submit" value="SUBMIT">
        </div> -->
        <br>
       
        <h3><center>HISTORY OF USER</center></h3>

        <table>
            <tr>
                <th>productimage</th>
                <th>productname</th>
                <th>baseprice</th>
                <th>productinformation</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
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
                <td><?php echo $rows['productinformation'];?></td>
            </tr>
            <?php
                }
             ?>

            
        </table>
    </div>

</body>
</html>
