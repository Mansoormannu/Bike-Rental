<?php

 require ("Entities/BikeEntity.php");
class BikeModel {
   
    function GetBikeTypes()
    {
        require 'Credentials.php';
        
        mysql_connect($host, $user, $passwd) or die(mysql_error());
        mysql_select_db ($database);
        $result = mysql_query("SELECT DISTINCT price FROM bike") or die(mysql_error());
        $price = array();
        
        while($row = mysql_fetch_array($result))
        {
            array_push($price,$row[0]);
        }
        
        mysql_close();
        return $price;        
    
    }
    function GetBikeByType($price)
    {
        require 'Credentials.php';
        
        mysql_connect($host, $user, $passwd) or die(mysql_error());
        mysql_select_db ($database);
        
        $query = "SELECT * FROM bike WHERE price LIKE '$price'";
        $result = mysql_query($query) or die(mysql_error());
        $bikeArray = array();
        
        while($row = mysql_fetch_array($result))
        {
            $name = $row[1];
            $cc = $row[2];
            $price = $row[3];
            $mileage = $row[4];
            $image = $row[5];
            $review = $row[6];
            
            $bike = new BikeEntity(-1,$name, $cc, $price, $mileage, $image, $review);
            array_push($bikeArray, $bike); 
        }
        
        mysql_close();
        return $bikeArray;
    }
}
?>