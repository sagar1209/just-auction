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
    $category = "painting";
  
    
     
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
      <h1>Just Auction</h1>
    </div>
  </div>

  <div class="buttons">

    <a href="3_HomePage.php" class="button">
      Home
    </a>

    <a href="8_AfterLoginMyAccount.php" class="button">
      My account
    </a>

    <a href="14_Buyer.html" class="button">
      Buyer
    </a>

    <a href="15_Seller.html" class="button">
      Seller
    </a>

    <a href="16_LiveAuction.html" class="button">
      Live Auction
    </a>

    <a href="17_AboutUs.html" class="button">
      About us
    </a>

    <a href="10_feedbackform.html" class="button">
      Feed-back
    </a>

    <a href="#" class="button">
      Help
    </a>

    <div class="dropdownsecond">
      <button class="dropbtnsecond">Catagory
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-contentsecond">
        <a href="painting.php">Painting</a>
        <a href="19_VintageCar.html">Vintage Car</a>
        <a href="20_AntiquePot.html">Antique pot/flask</a>
        <a href="21_Artifacts.html">Artifacts</a>
      </div>
    </div>


    <input type="text" placeholder="Search">
    <div id="Searchbar">
      <a href="#"><img src="Searchbar.jpg"></a>
    </div>

    <div class="dropdownsecond">
      <button class="dropbtnsecond">
        <div id="Profile">
          <img src="Profile3-modified.png" alt="Profile Pic" width="57" height="57">
        </div>
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-contentsecond">
        <a href="4_MyAccount.html">Log-Out</a>
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
      <p class="price">Auction Time : <?php echo $rows['bidtime'];?></p>

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