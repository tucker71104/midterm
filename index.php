<?php
    require_once('database.php');
    
    //Set search term or hard-code the parameter value
    $state = CA;
    
    $query = "SELECT firstName, lastName, city FROM customers WHERE state = ? ORDER BY lastName";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $state);
    $stmt->execute();
    
    $stmt->store_result();
    //store result fields in variables
    $stmt->bind_result($firstName, $lastName, $city);
 
    //use this method to display results
    while($stmt->fetch()) {
      echo "<p>First Name: ".$firstName;
      echo "<br />Last Name: ".$lastName;
      echo "<br />City: ".$city;
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
                    <th>City</th>
                </tr>
                <tr>
                <?php while($stmt->fetch()) ?> 
                        <td><?php echo $customer.$firstName; ?></td>
                        <td><?php echo $customer.$lastName; ?></td>
                        <td><?php echo $customer.$city; ?></td>
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
 
 