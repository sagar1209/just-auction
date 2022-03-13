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
//session_start();

//$username = $_SESSION['username'];
// $sql = "Select * from registration where username='$username' AND password='$password'";
// SQL query to select data from database


?>

<!DOCTYPE html>

<html>

<head>
  <title>Home page </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="Common.css">
  <link rel="stylesheet" href="3_HomePage.css">
  
  <!-- <link rel="stylesheet" href="dropdown.css"> -->
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

    <a href="14_Buyer.php" class="button">
      Buyer
    </a>

    <a href="15_Seller.php" class="button">
      Seller
    </a>

    <a href="16_LiveAuction.php" class="button">
      Live Auction
    </a>

    <a href="payment.php" class="button">
      Payment
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
        <a href="Log-Out.php" style="height: 4vh; margin-left: -37%;">Log-Out</a>
      </div>
    </div>

  </div>

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="https://media.istockphoto.com/photos/gavel-on-auction-word-picture-id917901978?k=20&m=917901978&s=612x612&w=0&h=NULGu8-bVpy28gbW6AZbZlEVra-Q4s2rg607emPfkCs=" alt="First slide" width ="200"  height="500">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="download.png" alt="Second slide" width ="200"  height="500">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="download(2).png" alt="Third slide" width ="200"  height="500">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  

  <br>
  <br>
  <div class="Details">

    <table>

      <div class="header">
        <tr>
          <th style="
    color: white;
">
            YESTERDAY
      
            
     
          </th>
        </tr>
        <tr>
          <td>
            <table>
            <?php
            include 'yesterday.php';
           ?>
          </table>
          </td>
        </tr>

        <tr>
     
          <th style="
    color: white;
">
            TODAY
            
           
         
          </th>

        </tr>
        <tr>
          <td>
            <table>
            <?php
            include 'today.php';
           ?>
          </table>
          </td>
        </tr>

        <tr>
          <th style="
    color: white;
">
            TOMMOROW
            
          </th>
        </tr>
        <tr>
          <td>
            <table>
            <?php
             include 'tomorrow.php';
            ?>
          </table>
          </td>
        </tr>
      </div>
      


      <!-- <tr>
        <td>
          <table>
        
        </table>
        </td>
      </tr>

        <td>
         <table>
      
        </table>
        </td>

        <td>
          <table>
        
         </table>
        </td>
      </tr> -->
    </table>

  </div>


</body>

</html>