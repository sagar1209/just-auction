<?php
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
    $username = $_POST['username'];
    $bdate = $_POST['date'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $c_ntact = $_POST['c_ntact'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $acc_number = $_POST['acc_number'];

    $sql = "INSERT INTO `registration1` (`name`, `username`, `bdate`, `age`, `gender`, `c_number`, `address`, `email`, `password`, `acc_number`, `dt`) VALUES ('$name', '$username', '$bdate', '$age', '$gender', '$c_ntact', '$address', '$email', '$password', '$acc_number', current_timestamp());";
    
    
    $result = mysqli_query($con, $sql);
    if ($result)
    {
        header("location: 5_SignIn_2.php");
    }
    

 
   
     }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="Common.css">
    <link rel="stylesheet" href="7_SignUp.css">
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
        <h2>SIGN UP</h2>
    </div>
    
    <div class="Details">
        <form action="7_SignUp_2.php" method= "post">
            <div>
                <label for="NAME">NAME :</label>
                <input type="text" name="name" id="NAME" required>
            </div>
            <br>
            <div>
                <label for="USERNAME">USERNAME :</label>
                <input type="text" name="username" id="NAME" required>
            </div>
            <br>
            <div>
                <label for="DATE">BIRTH DATE :</label>
                <input type="date" name="date" id="DATE" required>
            </div>
            <br>
            <div>
                <label for="AGE">AGE :</label>
              <input type="number" name="age" id="AGE" required>
              <br>
              GENDER :
             
              <label for="MALE">MALE</label>
             <input type="radio" name="gender" id="MALE">
             <label for="FEMALE">FEMALE</label>
             <input type="radio" name="gender" id="FEMALE">
             <label for="OTHER">OTHER</label>
             <input type="radio" name="gender" id="OTHER" required>
            </div>
            <br>
            <div>
                <label for="PHONE">CONTACT NUMBER :</label>
                <input type="tel" name="c_ntact" id="PHONE" required>
            </div>
            <br>
            <div>
                <label for="ADDRESS">ADDRESS :</label>
                <textarea name="address" id="ADDRESS" cols="50" rows="5" required></textarea>
            </div>
            <br>
            <div>
                
                <label for="EMAIL">EMAIL ID :</label>
                <input type="email" name="email" id="EMAIL" required>
            </div>
            <br>
            <div>
                <label for="PASSWORD">PASSWORD :</label>
                <input type="password" placeholder="at least 8 charecter" pattern="[A-Za-z0-9]{8,}" id="PASSWORD"  required><br><br>
                <label for="CONFORM_PASSWORD">CONFORM PASSWORD :</label>
                <input type="password" placeholder="conform_password" name = "password" id="CONFORM_PASSWORD" required>
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
            </div>
             <br>
            <div>
                <label for="ACCOUNT NUMBER">ACCOUNT NUMBER :</label>
                <input type="text" name="acc_number" pattern="[0-9]{11,16}" id="ACCOUNT NUMBER" required>
            </div>
            <br>
            
           

                    <button type="reset">Reset</button>

                    

                    <button type="submit">Submit</button>
            
        </form>
    </div>
   


</body>

</html>