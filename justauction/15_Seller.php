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
//session_start();

//$username = $_SESSION['username'];
// $sql = "Select * from registration where username='$username' AND password='$password'";
// SQL query to select data from database
$sql = "SELECT productname,username,productimage, baseprice, productinformation FROM productinformation ";
$result = $mysqli->query($sql);
$mysqli->close();
?>

    <!DOCTYPE html>

    <html>
    
    <head>
      <title>Seller </title>
      
      <link rel="stylesheet" href="Common.css">
      <link rel="stylesheet" href="14_Buyer.css">
      <!-- <link rel="stylesheet" href="dropdown.css"> -->
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
            <h1>
                Seller
            </h1>
        </div>
        
    
        <div class="Details">
        <table>
    
            <tr>
                <th>
                     Seller Name
                </th>
                <th>
                    Product Image
                </th>
                <th>
                     Product name
                </th>
                <th>
                    Product
                </th>
    
                <th>
                    Price
                </th>
        
            </tr>
    
            <?php   // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN-->
                
                <td><?php echo $rows['username'];?></td>
                <td><img src="<?php echo "upload/".$rows['productimage'];?>" width="100" height="100" alt="Image"></td>
                <td><?php echo $rows['productname'];?></td>
                <td><?php echo $rows['productinformation'];?></td>
                <td><?php echo $rows['baseprice'];?></td>
            </tr>
            <?php
                }
             ?>
    
        </table>
        
        </div>  
    
    
    </body>
    
    </html>
      

