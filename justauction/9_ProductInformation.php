

<?php
session_start();
  if($_SESSION['loggedin'] ==false)
  {
    header("location:8_AfterLoginMyAccount.php");
  }
$msg = "";
$showError = false;

if (isset($_POST['upload'])&& $_SESSION['loggedin'] ==true) {

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "ja";

    $con = mysqli_connect($server, $username, $password, $database);

    if(!$con)
    {
      echo "here is the prob";
        die("connection fail" . mysqli_connect_error());
    }
  $username = $_POST['username'];
  $productname = $_POST['productname'];
  $baseprice = $_POST['baseprice'];
  $expectedprice = $_POST['expectedprice'];
  $category = $_POST['scategory'];
  $productinformation = $_POST['productinformation'];
  $biddate= $_POST['biddate'];
  

  
  
    $filename = $_FILES['myfile']['name'];
    $tempname = $_FILES['myfile']['tmp_name'];    
        $folder = "upload/".$filename;
        if (!move_uploaded_file($tempname, $folder))  {
          die("Failed to upload image");
        }
        $sql = "INSERT INTO productinformation (username,productname,baseprice,expectedprice,category,productinformation,biddate,dt,productimage) VALUES ('$username','$productname','$baseprice','$expectedprice','$category','$productinformation','$biddate',current_timestamp(),'$filename')";

header("location:8_AfterLoginMyAccount.php");

if(!mysqli_query($con, $sql)){
  die("Unsuccess");
} 

    
  
}

?>
  

<?php
$showError = false;
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Product Information</title>
        <link rel="stylesheet" href="Common.css">  
        <link rel="stylesheet" href="9_ProductInformation.css"> 
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
    
          <?php
           if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        
    </div> ';
    }
    ?>
    <br>
    <br>
    <br>
        <div class="unique">
            <div id="MainName">
                <h1>
                    <br>
                    Product Information
                </h1>
            </div>
            
        
            <h3>
            <div class="Details">
              <form action="9_ProductInformation.php" method = "post" enctype='multipart/form-data'>
                    <br>Username :
                     <input type="text" name="username" required> <br>
                    <br>Name of product :
                    <input type="text" name="productname" required> <br>
                    <br>Image of product : <br>
                    <input type="file" name = "myfile" accept="image/png, image/jpeg, image/jpg" required><br>
                    <br>Base price of product : 
                    <input type="number" name="baseprice" required><br>
                    <br>Expected price of product : 
                    <input type="number" name="expectedprice" required><br>
                    <div>
                     
                      Select The Catagory Of Your Product :
                      <br>
                       <label class="Catagory" for="Painting">Painting</label>
                      <input type="radio" name="scategory" value="Painting"
                      id="CreditCard" class="Catagory" style="margin-left: 85px;"><br>
                      <label class="Catagory" for="VintageCAr">Vintage Car</label>
                      <input type="radio" name="scategory"  
                      value="Vintage Car"
                      id="DebitCard" class="Catagory" style="margin-left: 56px;"><br>
                      <label class="Catagory" for="AntiquePot/Flask">Antique Pot/Flask</label>
                      <input type="radio" name="scategory"
                      value="Antique Pot/Flask"
                      id="DebitCard" class="Catagory" style="margin-left: 8px;"><br>
                      <label class="Catagory" for="Artifacts">Artifacts</label>
                      <input type="radio" name="scategory"
                      value="Artifacts"
                      id="DebitCard" class="Catagory" style="margin-left: 83px;"><br>
                     
                     </div>
                     <br>
                    <br>Information of product : <br>
                    <textarea name="productinformation" id="Information" cols="50" rows="5" required></textarea>
                    <br>
                    <div>
                      <label for="DATE">Enter Date for biding :</label>
                      <input type="date" name="biddate" id="DATE" required>
                  </div>
                  <br>
                    <button type="reset">Reset</button>
                    
                    <button type="submit" name ="upload">Submit</button>
                    <br>
                  </form>
                </div>
            </h3>
        </div>
        
   
    </body>

</html>
