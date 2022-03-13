<?php 
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
    $email = $_POST["email"];
    
     
     $sql = "Select * from registration where email='$email'";
    //$sql = "Select * from registration where username='$username'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    
   
    if ($num == 1){
        
        while($row=mysqli_fetch_assoc($result)){
        
              
                $to_email = "$email";
                $subject = "Forgot Password";
                $body = " Hii ". $row['username'] . "," . "\n" . "\n". " Your  Password  is :  ". $row['password'] ."\n"."\n" ."\n" . " Thank you!! " ;
                $headers = "justauction001@gmail.com";
 
                if (mail($to_email, $subject, $body, $headers)) {
                    $showError = "Email successfully sent to $to_email...";
                  } else {
                 echo "Email sending failed...";
                 }
        }
        
    } 
    else{
        $showError = "Invalid email";
    }
}

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Forgot password</title>
        <link rel="stylesheet" href="Common.css">
        <link rel="stylesheet" href="6_ForgotPassword.css">
    </head>
    <body>

        <div class="navigation">
            <div id="auctionlogo">
            <img src="4.jpeg" alt="Auctionlogo"  width ="150"  height="150">
            </div>
        </div>
           <br>
           <?php
           if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>success!</strong> '. $showError.'
        
    </div> ';
    }
    ?>
        
            <div class="SiteName">
                    <h2><marquee>Welcome to our "Just Auction" Website.</marquee></h2>
                </div>
        
                <br>
                <br>
       
        <div class="unique">
        <div id="MainName">
            <h2>
                Forgot Password?
            </h2>

        </div>
            

            <br>
            <br>

        <div class="Details">
        <form action="6_ForgotPassword_1.php" method="post">

            <h3>
            Email Id :
            <input type="email" name="email" id="EMAIL" required>
            </h3>
            
            <br>
            <br>
            <br>
    
            
            <button type="reset">Reset</button>
            
            <button type="submit">Submit</button>
        </form>

        </div>
        <br>
    </div>

    </body>
</html>