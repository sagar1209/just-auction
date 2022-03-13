<?php 
      session_start();
      $_SESSION['pay'] = true;

      ?>
<?php



if(isset($_GET['logout'])){    
	
	//Simple exit message
    $logout_message = "<div class='msgln'><span class='left-info'>User <b class='user-name-left'>". $_SESSION['name'] ."</b> has left the chat session.</span><br></div>";
    file_put_contents("log.html", $logout_message, FILE_APPEND | LOCK_EX);
	
	session_destroy();
	header("Location: 16_LiveAuction.php"); //Redirect the user
}

if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    }
    else{
        echo '<span class="error">Please type in a name</span>';
    }
}

function loginForm(){
    echo '<div id="loginform">
    <p>Please enter your name to continue!</p>
    <form action="16_LiveAuction.php" method="post">
      <label for="name">Name &mdash;</label>
      <input type="text" name="name" id="name" />
      <input type="submit" name="enter" id="enter" value="Enter" />
    </form>
  </div>';
}

?>

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
// SQL query to select data from databasex

$startDate = date("2021-11-18");
$endDate = date("2021-11-18");
$sql ="SELECT productname, username, productimage, baseprice, productinformation FROM productinformation
    WHERE biddate
    BETWEEN '$startDate 00:00:00' AND '$endDate 23:59:59'";

             
$result = $mysqli->query($sql);
$rows=$result->fetch_assoc();
$mysqli->close();
?>


<!DOCTYPE html>
<html>

<head>
    <title>Live Auction</title>
    <link rel="stylesheet" href="Common.css">
    <link rel="stylesheet" href="16_LiveAuction(1).css">
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
    <br>

    <div class="combo">

        <div id="ProductName">
            Product Name:
            <?php echo $rows['productname'];?>
        </div>
        <br>

        <div class="Information">

        <img src="<?php echo "upload/".$rows['productimage'];?>" width="100" height="100" alt="Image">

            <div class="Information">
                <div>
                    <div>
                        <pre>User Name  : <?php echo  $_SESSION['username'];?> </pre>
                    </div>

                    <br>

                    <div>
                        <pre>Seller userName  : <?php echo $rows['username'];?> </pre>  
                    </div>
                    <br>
                    <br>
                    <div style="display: flex;">

                        <div id="Price" style="margin-right: 260px;">
                            Base Price :
                            <?php echo $rows['baseprice'];?>
                        </div>

                        <pre>Count Down : </pre>
                        <p id="demo"></p>

<script>
// Set the date we're counting down to
var countDownDate = new Date("NOvember 18, 2021 12:14:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
    
    window.location="3_HomePage.php";
  }
}, 1000);

</script>
                      </div>
                    <br>
                    <br>
                    <div id="MainInformation">
                        PRODUCT INFORMATION:
                        <?php echo $rows['productinformation'];?>
                    </div>
                    <br>


                    
                    <br>

                    <!-- <a href="23_PaymentDetails.html">
                        <button>Payment</button>
                    </a> -->
                    <br>
                </div>

            </div>
        </div>

        <div style="font-size:larger;">
            <!-- <div class="combo2">
                <input type="number" placeholder="Bid Now">
                <div id="Searchbar">
                    <a href="#"><img src="Submit11.jpg"></a>
                </div>
            </div> -->
            <?php
    if(!isset($_SESSION['name'])){
        loginForm();
    }
    else {
    ?>
            <div id="wrapper" style="margin-right: 20%;">
                <div id="menu">
                    <p class="welcome" style="color: black;font-weight: 900;font-size:x-large;text-shadow: 0 0 white;">
                        Live Auction, <b><?php echo $_SESSION['name'];?></p>
                    <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
                </div>

                <div id="chatbox">
                <?php
            if(file_exists("log.html") && filesize("log.html") > 0){
                $contents = file_get_contents("log.html");          
                echo $contents;
            }
            ?>
            </div>
                <form name="message" action="">
                    <input name="usermsg" type="text" id="usermsg" />
                    <input name="submitmsg" type="submit" id="submitmsg" value="Bid Now" />
                </form>
            </div>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script type="text/javascript">
               // jQuery Document
            $(document).ready(function () {
                $("#submitmsg").click(function () {
                    var clientmsg = $("#usermsg").val();
                    $.post("post.php", { text: clientmsg });
                    $("#usermsg").val("");
                    return false;
                });

                function loadLog() {
                    var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request

                    $.ajax({
                        url: "log.html",
                        cache: false,
                        success: function (html) {
                            $("#chatbox").html(html); //Insert chat log into the #chatbox div

                            //Auto-scroll			
                            var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request
                            if(newscrollHeight > oldscrollHeight){
                                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                            }	
                        }
                    });
                }

                setInterval (loadLog, 2500);

                $("#exit").click(function () {
                    var exit = confirm("Are you sure you want to end the session?");
                    if (exit == true) {
                    window.location = "16_LiveAuction.php?logout=true";
                    }
                });
            });
        </script>
        </div>
        <br>
        <br>
    </div>

    <br>
    <br>
    <br>
    <br>


</body>

</html>
<?php
}
?>