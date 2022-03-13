<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
    <link rel="stylesheet" href="Common.css">
    <link rel="stylesheet" href="23_PaymentDetails.css">
</head>
<body>

    
    <div class="navigation">
        <div id="auctionlogo">
        <img src="4.jpeg" alt="Auctionlogo"  width ="150"  height="150">
        </div>
    </div>
       <!-- <br>
      
    
        <div class="SiteName">
                <h2><marquee>Welcome to our "Just Auction" Website.</marquee></h2>
            </div>
     -->
            <br>
            <br>
        <div class="unique">
             
      
    
            <div id="MainName">
                <h2>Payment Details</h2>
            </div>
            
            <div class="Details">
                <form action="bakend.php">
                    <div>
                        <div>
                     
                            Select Your Choice For Payment :
                            <br>
                             <label class="Card" for="Credit Card">Credit Card</label>
                            <input type="radio" name="Scard" id="CreditCard" class="Card">
                            <label class="Card" for="Debit Card">Debit Card</label>
                            <input type="radio" name="Scard" id="DebitCard" class="Card">
                           
                           </div>
                           <br>
                           <br>
                        <label for="NAME">Card Owner :</label>
                        <input type="text" name="Sname" id="NAME" required>
                    </div>
                    <br>
                    
                    <div>
                    <label for="Card Number">Card Number :</label>
                    <input type="text" name="Sname" id="Card NUMBER" required>
                    <br>
                    <div>
                        <label for="DATE">Expiration DATE :</label>
                        <input type="date" name="Sdate" id="DATE" required>
                    </div>
                    <br>
                    <div>
                    <label for="CVV">CVV :</label>
                    <input type="text" name="Sname" id="CVV" required>
                    <br>
            
                    <a href="23_PaymentDetails.html">
                    <button type="reset">Reset</button>
                    </a>
                    <button type="submit">CONFIRM PAYMENT</button>

                    <br>
                    <br>
                    <br>
                    
                </form>
            </div>


</body>
</html>