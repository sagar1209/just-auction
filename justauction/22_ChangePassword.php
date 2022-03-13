<?php
$login = false;
$showError = false;
session_start();
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
   
   $username = $_SESSION['username'];
   $email = $_SESSION['email'];
   
    
   $sql = "Select * from registration where username='$username' AND email='$email'";
   //$sql = "Select * from registration where username='$username'";
   $result = mysqli_query($con, $sql);
   $num = mysqli_num_rows($result);
   
   $newpassword = $_POST['newpassword'];
   if ($num == 1){
       
       while($row=mysqli_fetch_assoc($result)){
       
             
        mysqli_query($con,"UPDATE registration  set password ='" . $newpassword . "' WHERE username='" . $username . "'");
        $login = true;
       }
       
   } 
   else{
    mysqli_query($con,"UPDATE registration1  set password ='" . $newpassword . "' WHERE username='" . $username . "'");
    $login = true;
   }
}

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Change Password</title>
        <link rel="stylesheet" href="Common.css">
        <link rel="stylesheet" href="22_ChangePassword.css">
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
        <strong>Error!</strong> '. $showError.'
        
    </div> ';
    }
        if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> password upadeted succesfully
        
    </div> ';
    }   
    ?>
        
                <br>
                <br>
       

                <div class="unique">
        <div id="MainName">
            <h2>
                Change The Password
            </h2>

        </div>
            

            <br>
            <br>

        <div class="Details">
         <form action="22_ChangePassword.php" method="post">

            <h3>
                New Password:
                <input type="password" name="newpassword" placeholder="at least 8 charecter" pattern="[A-Za-z0-9]{8,}" id="PASSWORD"  required>
            </h3>
            <br>
            <br>
            <h3>
                Confirm Password:
                <input type="password" name="cpassword" placeholder="at least 8 charecter" pattern="[A-Za-z0-9]{8,}" id="CONFORM_PASSWORD"  required>
            </h3>
            <script>
                    var PASSWORD = document.getElementById("PASSWORD")
                      , CONFORM_PASSWORD = document.getElementById("CONFORM_PASSWORD");
    
                         function validatePassword(){
                             if(PASSWORD.value != CONFORM_PASSWORD.value) {
                                CONFORM_PASSWORD.setCustomValidity("Passwords Don't Match");
                             } else {
                                CONFORM_PASSWORD.setCustomValidity('');
                             }
                         }
    
                              PASSWORD.onchange = validatePassword;
                              CONFORM_PASSWORD.onkeyup = validatePassword;
                </script>

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