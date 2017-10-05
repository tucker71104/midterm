<?php
    require_once('database.php');
    
    //Set search term or hard-code the parameter value
    $state = CA;
    $version = 2.0;
    $customerID = 1004;
    
    //$query = "SELECT firstName, lastName, city, productCode FROM customers, products WHERE state = ? and version = ? ORDER BY lastName";
    //$query = "SELECT firstName, lastName, city, productCode, name FROM customers, products WHERE state = ? and customerID = ? ORDER BY lastName";
    $query = "SELECT firstName, lastName, productCode, name FROM customers, products WHERE customerID = ? ORDER BY lastName";

    $stmt = $db->prepare($query);
    //$stmt->bind_param('ss', $state, $version);
    $stmt->bind_param('s', $customerID);
    $stmt->execute();
    
    $stmt->store_result();
    //store result fields in variables
    //$stmt->bind_result($firstName, $lastName, $city, $productCode, $name);
    $stmt->bind_result($firstName, $lastName, $productCode, $name);
 
    //use this method to display results
    while($stmt->fetch()) {
      echo "<p>First Name: ".$firstName;
      echo "<br />Last Name: ".$lastName;
      //echo "<br />City: ".$city;
      echo "<br />Product Code: ".$productCode;
      echo "<br />Name: ".$name;
    }
    
    $stmt->free_result();
    $db->close();
 ?>
 <!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Tech Support</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <div id="page">

    <div id="header">
        <h1>Tech Support</h1>
    </div>

    <div id="main">

        <h1>Tech Support</h1>

        <div id="content"> 
            
             <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Product Code</th>
                    <th>Product Name</th>
                </tr>
                <tr>
                <?php while($stmt->fetch()) ?> 
                        <td><?php echo $customer.$firstName; ?></td>
                        <td><?php echo $customer.$lastName; ?></td>
                        <td><?php echo $customer.$productCode; ?></td>
                        <td><?php echo $customer.$name; ?></td>
                </tr>
            </table>

        </div>
    </div>

    <div id="footer">
        <p>&copy; <?php echo date("Y"); ?> Tech Support</p>
    </div>

    </div><!-- end page -->
</body>
</html>
 
 