<?php

	 $servername = 'mysql:host=localhost;dbname=library'; 
    
    $username = "root"; 
    $password = ""; 
   

    try{

    	$conn = new PDO( $servername,$username,$password );
    	//echo 'Connection succesful';
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }catch(PDOException $e) { 
    echo 'not connected';
} 





?>