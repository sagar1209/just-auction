<?php


$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "ja";

    $con = mysqli_connect($server, $username, $password, $database);

    if(!$con)
    {
        die("connection fail" . mysqli_connect_error());
    }
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
     
     $sql = "Select * from registration1 where username='$username' AND password='$password'";
    //$sql = "Select * from registration where username='$username'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
   
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
           
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['pay'] == false;
                $_SESSION['username'] = $username;
                $_SESSION['name'] =$row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['c_number'] = $row['c_number'];
                header("location: 3_HomePage.php");
           
           
        }
        
    } 
    else{
        $showError = "Invalid Credentials";
    }
}

?>

<!DOCTYPE html>

<html>

<head>
    <title>
        Sign in Page
    </title>
    <link rel="stylesheet" href="Common.css">
    <link rel="stylesheet" href="5_SignIn.css">
</head>
<body>
   
    <div class="navigation">
    <div id="auctionlogo">
    <img src="4.jpeg" alt="Auctionlogo"  width ="150"  height="150">
    </div>
</div>
   <br>
  

    <div class="SiteName">
            <h2><marquee>Welcome to our "Just Auction" Website.</marquee></h2>
        </div>

        <br>
        <br>
    <div class="unique">
         
  

    <div id="MainName">
        <h1>
            Sign in
        </h1>  

    </div>
    
    <div class="Details">
      <form action="5_SignIn_2.php" method = "post" >
        <h3>
            User Name:
            <input type="text" name="username" id="NAME" required>
        </h3>
    
        <br>
        <br>
        <h3>
            Password:
            <input type="password" placeholder="at least 8 charecter" name="password"  pattern="[A-Za-z0-9]{8,}" id="PASSWORD"  required><br><br>
        </h3>
    
    
        <a href="6_ForgotPassword_2.php" class="Details">
            <div id="Forgot">
                CLICK HERE IF YOU FORGOT PASSWORD.
            </div>
        </a>

 
    
        <a href="7_SignUp_2.php" class="Details" >
            <div id="Forgot">
                CLICK HERE IF YOU DON'T HAVE ACCOUNT.
            </div>
        </a>           
   
    <br>
         
        <br>

        
        <button type="reset">Reset</button>
        
        <button type="submit">Submit</button>


    <br>
    </form>
    

    
</div>

    </div>
<br>
   
        

</body>
</html>