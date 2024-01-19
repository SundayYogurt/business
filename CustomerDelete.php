<?php

if(isset($_GET['CustomerID'])){
$strCustomerID = ($_GET['CustomerID'])
;}
require 'connect.php' ;
$sql = "DELETE FROM customer WHERE CustomerID = :CustomerID " ;
$stmt = $conn->prepare($sql);
$stmt->bindParam (':CustomerID', $_GET['CustomerID']);

if ($stmt->execute()) :
            $message = "Suscessfully delete customer".$_GET['CustomerID'].".";
        else :
            $message = "Fail to delete customer";
        endif;
        echo $message;



?>