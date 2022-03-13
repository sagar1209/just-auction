<?php
 session_start();
 if($_SESSION['pay'] == false)
 {
    header("location: 3_HomePage.php");

 }
?>

<?php
// Merchant key here as provided by Payu
$MERCHANT_KEY = "rjQUPktU";

// Merchant Salt as provided by Payu
$SALT = "e5iIg1jwi8";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <link rel="stylesheet" href="23_PaymentDetails.css">
  <body onload="submitPayuForm()">
  <!-- <style>
    body
{
    background-size: 102% 113%;   
}

.Details
{
    padding-left: 30%;
}

#MainName
{
    padding-top: 2%;
    padding-bottom: 2%;
}

body
{
    background-size: 130% 2000000%;  
    /* background-image: url("https://media.istockphoto.com/photos/abstract-grunge-black-texture-background-picture-id1131428317?b=1&k=20&m=1131428317&s=170667a&w=0&h=ifnn3wn3j_DNPp4Gh4DjE_L_abuQfZlY3omyJ77tc0E=");
    background-repeat: no-repeat;      */
    background-image: url("FinalBackground4.jpg");
    background-repeat: no-repeat;
}

.Details
{
    padding-left: 30%;
    /* color: rgb(145, 123, 2);
    text-shadow: 0.5px 0.6px 2px black; */
    color: black;
    text-shadow: 0.5px 0.6px 2px rgb(145, 123, 2);
}

#MainName
{
    padding-top: 2%;
    padding-bottom: 3%;
    /* color: rgb(145, 123, 2);
    text-shadow: 1.3px 0.6px 2px black; */
    color: black;
    text-shadow: 0.5px 0.6px 2px rgb(145, 123, 2);
}
#Searchbar img
{
    height: 6vh;
    width : 3vw;
    margin: 0vh 0.1vw;
}

#auctionlogo img
{
    height: 50%;
    width: 25%;
    padding-left: 43%;
    background-color: black;
}

.SiteName
{
    padding-left: 30%;
    background-color: transparent;
    color: black;
    text-shadow: 30px 0.6px 2px rgb(145, 123, 2);
    
}
.navigation
{
      background-color: black;
}

.unique
{
    background-image: url("FinalBackground4.jpg");
    background-repeat: no-repeat;
    background-position: 50%;
    background-size: 45% 100%;
}


    .SiteName 
    {
       
        text-shadow: 2px 0.6px 2px black;
        
    }
    input[type=text] , input[type=password] , input[type=submit] , input[type=reset] , input[type=number] , input[type=date] , input[type=tel] , input[type=email] , input[type=radio] , textarea
    {
        border-style: ridge;
        /* border-radius: 5px; */
        border-color: rgb(145, 123, 2);
        color: black;
        
        /* text-shadow: 0.5px 0.6px 2px rgb(145, 123, 2); */
        padding: 0.6%;
    }

    input[type=text] , input[type=password] , input[type=number] , input[type=date] , input[type=tel] , input[type=email] , textarea
    {
        display: block;
        background-color: transparent;
        border: 0;
        border-bottom: 1px solid rgb(145 123 2);
        height: 27px;
        line-height: 27px;
        width: 44%;

    }

    /* input[type=submit] , input[type=reset]
    {
        color: white;
        text-shadow: 2px 0.6px 2px rgb(145, 123, 2);
        border-radius: 5px;
        background-color: rgb(145, 123, 2);
    } */


/* .gender{
    padding: px;
} */

.gender{
    padding-left: 10px; 
}

/* .male{
    padding-left: 0;
}

.female{
    padding-left: 10px;
}

.other{
    padding-left: 10px;
} */

button{
    color: white;
    /* text-shadow: 2px 0.6px 2px rgb(145 123 2); */
    display: block;
    border-radius: 5px;
    width: 24%;
    height: 31px;
    align-self: center;
    margin: 10px;
    margin-left: 150px;
    background-color: rgb(145, 123, 2);
    font-size:medium;
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-weight: 700;
}

button:hover{
    cursor: pointer;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
.navigation
{
      background-color: black;
}
body
{
    background-size: 130% 2000000%;  
    /* background-image: url("https://media.istockphoto.com/photos/abstract-grunge-black-texture-background-picture-id1131428317?b=1&k=20&m=1131428317&s=170667a&w=0&h=ifnn3wn3j_DNPp4Gh4DjE_L_abuQfZlY3omyJ77tc0E=");
    background-repeat: no-repeat;      */
    background-image: url("FinalBackground4.jpg");
    background-repeat: no-repeat;
}

.Details
{
    padding-left: 35%;
    /* color: rgb(145, 123, 2);
    text-shadow: 0.5px 0.6px 2px black; */
    color: black;
    text-shadow: 0.5px 0.6px 2px rgb(145, 123, 2);
}

#MainName
{
    padding-top: 2%;
    padding-bottom: 3%;
    /* color: rgb(145, 123, 2);
    text-shadow: 1.3px 0.6px 2px black; */
    color: black;
    text-shadow: 0.5px 0.6px 2px rgb(145, 123, 2);
}
#Searchbar img
{
    height: 6vh;
    width : 3vw;
    margin: 0vh 0.1vw;
}

#auctionlogo img
{
    height: 25%;
    width: 15%;
    padding-left: 43%;
    background-color: black;
}

.SiteName
{
    padding-left: 30%;
    background-color: transparent;
    color: black;
    text-shadow: 30px 0.6px 2px rgb(145, 123, 2);
    
}
.navigation
{
      background-color: black;
}

.unique
{
    background-image: url("FinalBackground4.jpg");
    background-repeat: no-repeat;
    background-position: 50%;
    background-size: 45% 100%;
}


    .SiteName 
    {
       
        text-shadow: 2px 0.6px 2px black;
        
    }
    input[type=text] , input[type=password] , input[type=submit] , input[type=reset]
    {
        border-style: ridge;
        
        border-color: rgb(145, 123, 2);
        color: black;
        text-shadow: 0.5px 0.6px 2px rgb(145, 123, 2);
        padding: 0.6%;
    }


    button{
        color: white;
        /* text-shadow: 2px 0.6px 2px rgb(145 123 2); */
        display: block;
        border-radius: 5px;
        width: 24%;
        height: 31px;
        align-self: center;
        margin: 10px;
        margin-left: 120px;
        background-color: rgb(145, 123, 2);
        font-size:medium;
        font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-weight: 700;
    }
    
    button:hover{
        cursor: pointer;
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    }

    .SiteName 
    {
       
        text-shadow: 2px 0.6px 2px black;
        
    }
    input[name=amount] , input[name=surl] , input[name=furl] , input[type=hidden] , input[name=firstname] , input[name=email] , textarea[name=productinfo] , input[name=phone]
    {
        border-style: ridge;
        /* border-radius: 5px; */
        border-color: rgb(145, 123, 2);
        color: black;
        
        /* text-shadow: 0.5px 0.6px 2px rgb(145, 123, 2); */
        padding: 0.6%;
    }

    input[name=amount] , input[name=surl] , input[name=furl] , input[type=hidden] , input[name=firstname] , input[name=email] , textarea[name=productinfo] , input[name=phone]
    {
        display: block;
        background-color: transparent;
        border: 0;
        border-bottom: 1px solid rgb(145 123 2);
        height: 27px;
        line-height: 27px;
        width: 44%;

    }

    .Card{
        margin-top: 1.5%;
        padding-left: 10px; 
    }

    input[type = radio]
    {
        padding-top: 30px;
    }
    body
    {
      background-color : white;
    }
    input[type = submit]
    {
      color: white;
    /* text-shadow: 2px 0.6px 2px rgb(145 123 2); */
    display: block;
    border-radius: 5px;
    width: 24%;
    height: 31px;
    align-self: center;
    margin: 10px;
    margin-left: 150px;
    background-color: rgb(145, 123, 2);
    font-size:medium;
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-weight: 700;
    }
    #MainName

{

    

    /* color : black; */

    /* color: rgb(145, 123, 2); */

    text-align: center;

    color: black;

    text-shadow: 0.5px 0.6px 2px rgb(145, 123, 2);

} -->
  </style>
  <div class="navigation">
        <div id="auctionlogo">
        <img src="4.jpeg" alt="Auctionlogo"  width ="150"  height="150">
        </div>
    </div>
   <div id="MainName">
    <h2>PayU Form</h2>
    </div>
    <br/>
    <?php if($formError) { ?>
	
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" action="payment.php" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
	  <input type="hidden" name="hash_abc" value="<?php echo $hash_string ?>"/>
    <div class="Details">
      <table>
        <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        <tr>
          <td>Amount: </td>
          <td><input name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" /></td>
          <td>First Name: </td>
          <td><input name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" /></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><input name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>
          <td>Phone: </td>
          <td><input name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td>
        </tr>
        <tr>
          <td>Product Name: </td>
          <td colspan="3"><textarea name="productinfo"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></textarea></td>
        </tr>
        <tr>
          <td>Success URI: </td>
          <td colspan="3"><input name="surl" value="<?php echo (empty($posted['surl'])) ? '' : $posted['surl'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td>Failure URI: </td>
          <td colspan="3"><input name="furl" value="<?php echo (empty($posted['furl'])) ? '' : $posted['furl'] ?>" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>

          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Submit" name="payuForm"/></td>
          <?php } ?>
        </tr>
      </table>
      </div>
    </form>
  </body>
</html>
<?php

 if(isset($_POST['payuForm'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "ja";

    $con = mysqli_connect($server, $username, $password, $database);

    if(!$con)
    {
        die("connection fail" . mysqli_connect_error());
    }


    $buyername = $_POST['firstname'];
    $productinformation = $_POST['productinfo'];
    $price = $_POST['amount'];
    
   
        $sql = "INSERT INTO `buyer` (`buyername`, `productinformation`, `price`, `dt`) VALUES ('$buyername', '$productinformation', '$price', current_timestamp());";
        $result = mysqli_query($con, $sql);
    
  
  }


?>