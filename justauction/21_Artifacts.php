<?php



    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "ja";

    $con = mysqli_connect($server, $username, $password, $database);

    if(!$con)
    {
        die("connection fail" . mysqli_connect_error());
    }
    $category = "artifacts";
  
    
     
     $sql = "Select * from productinformation where category='$category'";
    //$sql = "Select * from registration where username='$username'";
    $result = mysqli_query($con, $sql);
     
   
  
?>

<!DOCTYPE html>
<html>

<head>
  <title>Search</title>
  <link rel="stylesheet" href="Common.css">
  <link rel="stylesheet" href="24_Card.css">
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
  <!-- <h2 style="text-align:center">Product Card</h2> -->

  <!-- Start Code of Cards -->
  <?php   // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
             ?>
  <div class="allCard">

    
    <div class="card">
     

      <img src="<?php echo "upload/".$rows['productimage'];?>" alt="Product img" style="width:100%">
      <h2><?php echo $rows['productname'];?></h2>

      <p class="price" id="CurrentPrice">Auction Date : <?php echo $rows['biddate'];?></p>
     

      <p class="price" id="CurrentPrice">Base Price : <?php echo $rows['baseprice'];?></p>
      <p class="price">Expected Price : <?php echo $rows['expectedprice'];?></p><br>
      
     
    </div>
    <br><br>
    

  </div>
  <br><br>
  <?php
                }
      ?>
  <!-- End Code of Cards -->
  
<br><br>
</body>

</html>