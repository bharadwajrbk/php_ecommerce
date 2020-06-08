<?php
session_start();

require('mysqli_connect.php'); 

$a = "SELECT * FROM products WHERE productId = {$_GET['id']}";
$b = @mysqli_query($dbc, $a); 

if ($b) { 


while ($row = mysqli_fetch_array($b, MYSQLI_ASSOC)) {
    $_SESSION['productId'] = $row['productI'];
    $_SESSION['productName'] = $row['productName'];
    $_SESSION['quantity'] = $row['quantity'];
 }

mysqli_free_result($b); 
mysqli_close($dbc);
    redirect_user('checkout.php');
    
}

?>
<?php
function redirect_user($page = 'order.php') {

                 $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
                 $url = rtrim($url, '/\\');
                 $url .= '/' . $page;
                header("Location: $url");
                exit();

            } 
?>