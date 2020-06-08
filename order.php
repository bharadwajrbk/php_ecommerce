<?php
include('links/header.html');
require('mysqli_connect.php');
$a = "SELECT * FROM products";
$db = @mysqli_query($dbc, $a);
if($db){
    echo'<table>
            <thead>
                <tr>
                <th>Products</th>
                <th>Available Quantity</th>
                </tr>
            </thead>
            <tbody align="center">';
    while($row = mysqli_fetch_array($db, MYSQLI_ASSOC)){
        echo '<tr>
              <td align="centre" text->
              <a href="session.php?id=' . $row['productId']. '">' .
              $row['productName'] . '</a>
              <td align="center">' . $row['quantity'].'</td></tr>';
    }
    echo '</tbody></table>';
    mysqli_free_result($db);
    }
else{
    echo '<p class="error">Please try again later</p>';
    echo '<p class="c">' . mysqli_error($dbc) . '<br>Query:' . $a . '</p>';
}

mysqli_close($dbc);
include('links/footer.html')
?>

<html>
<head>
    <link href="css/styles.css" rel="stylesheet" type="text/css" media="all">
</head>
</html>