<?php
include('links/header.html');
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require('mysqli_connect.php');
	$errors = [];
	if(empty($_POST['firstName'])) {
		
		$errors[] = "Please Enter your firstName";
		echo '<p>Enter your First Name</p>';
		
	}
	else{
	if(isset($_POST['firstName'])){
$fn = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
                $fn_regexp="/[a-zA-Z]{4,}/";
				if(preg_match($fn_regexp,$fn)){
					
				}
				else {
					$errors[]="name must be number and atleast length 4";
				}
	}
    }
    if(empty($_POST['lastname'])){
        $errors[]="Please enter your last name";
        echo '<p>Enter your Last name</p>';
    }
    else{
        $ln =mysqli_real_escape_string($dbc,trim($_POST['lastname']));
    }
    if(empty($_POST['email'])) {
		
		$errors[] = "Please enter your email";
		echo '<p>Enter your email</p>';
	}
	else {
		
		$em = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	
	 if(isset($_POST['paymentcard'])){
		 
		 $pay = $_POST['paymentcard'];
		
	 }
	 else{
		 
		 $errors[] = "Please Select a Payment option";
		echo  '<p>Select a Payment option</p>';
		
	 }

	
	if(empty($errors)) {
$a = "INSERT INTO orders(firstName, lastName,email, productID) VALUES ('$fn', '$ln', '$em',{$_SESSION['productID']})";
	
	
	
    $newQuantity = (int)$_SESSION['quantity'] - 1;

	
$a1 = "UPDATE products SET quantity = $newQuantity WHERE productID = {$_SESSION['productID']}";
$b = @mysqli_query($dbc, $a); 
$b1 = @mysqli_query($dbc, $a1);
if (mysqli_affected_rows($dbc)) { 

    $_SESSION = [];
    session_destroy();
redirect_user('order.php');

mysqli_free_result($b); 

} else { 

echo '<p class="error">Please try again </p>';

 echo '<p>'. mysqli_error($dbc). '<br><br>Query:' . $a .'</p>';
}
}
	
mysqli_close($dbc); 
}

?>
<head>
    <link href="CSS/style.css" rel="stylesheet" type="text/css" media="all">
</head>
<h1>CHECK OUT</h1>


<form action="checkout.php" method="post">
 <fieldset>
     <legend>Payment Details</legend>
    <p>First Name: <input type="text" name="firstName"></p>
    <p>Last Name: <input type="text" name="lastName"></p>
    <p>Email:     <input type="text" name="email"></p>
     <label for="pay">Payment Method: </label>
<div>
<div>
  <input type="radio" id="credit" name="paymentcard" value="creditcard">
  <label for="credit">Credit Card</label>
</div>
    <div>
  <input type="radio" id="master" name="paymentcard" value="master">
  <label for="credit">Mastercard</label>
</div>
<div>
  <input type="radio" id="debit" name="paymentcard" value="debitcard">
  
  <label for="debitcard">Debit Card</label>
</div>
</div>
	<p>
	<input type="submit" value="Submit">
		</p>
		
	</fieldset>		
</form>
<?php
function redirect_user($page = 'home.php') {

                 $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
                 $url = rtrim($url, '/\\');
                 $url .= '/' . $page;
                header("Location: $url");
                exit();

    
    
    
    
}
?>