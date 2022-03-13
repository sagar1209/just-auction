<?php
  $alert = false;
   if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "ja";

    $con = mysqli_connect($server, $username, $password, $database);

    if(!$con)
    {
        die("connection fail" . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `feedback` (`name`,  `email`, `subject`, `message`, `dt`) VALUES ('$name', '$email', '$subject', '$message', current_timestamp());";
    
       
   
    $result = mysqli_query($con, $sql);
    if($result)
    {
      $alert = true;
    }
 
        
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="Common.css">
    <link rel="stylesheet" href="10_Feedbackform.css">
    <title>Feedback Form</title>
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
<br>
<?php
if($alert){
  echo '<div role= "alert">
  <strong>Success!</strong> Your entry has been submitted successfully!
  
 </div>';
 }
?>
  
<div class="unique">
    <div id="MainName">
        <h2>
            <br>
            FEED-BACK FORM
        </h2>
    </div>
    <br>
       <div class="Details">

    <form action="10_feedbackform.php" method= "post">
        <div>
            <label for="name">NAME :</label>
            <input type="text" name="name" id ="name" required>
        </div>
        <br><br>
        <div>
            <label for="email">EMAIL :</label>
            <input type="email" name="email" id="email" required>
        </div>
        <br><br>
        <div>
            <label for="subject">SUBJECT :</label>
            <input type="text" name="subject" id="subject" required>
        </div>
        <br><br>
        <div>
            <label for="message">MESSAGE :</label><br>
            <textarea name="message" id="message"  required cols="50" rows="10"></textarea>
        </div>
        <br><br>
        <div>
            
            <button type="reset">Reset</button>
            
            <button type="submit">Submit</button>
        </div>
      </form>
    </div>
    <br>
</div>

</body>
</html>