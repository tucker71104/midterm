<?php
    $dsn = 'localhost';
    $dbname = 'tech_support';
    $username = 'ts_user';
    $password = 'pa55word';
    
    $db = new mysqli($dsn,  $username, $password, $dbname);
    
    if(mysqli_connect_errno())
    {
        echo '<p>Error: could not connect to DB.<br/>Please try later.</p>';
        include('database_error.php');
        exit();
    }
?>