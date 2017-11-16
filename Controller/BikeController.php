<!DOCTYPE html>
<html>
    <body>
<?php

require ("Model/BikeModel.php");


class BikeController {

function CreateBikeDropdownList()
{
    $bikeModel = new BikeModel();
    $result = "<form action = '' method = 'post' width = '200px'>
             Please select your price range:
             <select name = 'price' >
               <option value = '%' >All</option>
             ".$this->CreateOptionValues($bikeModel->GetBikeTypes()).
            "</select>
             <input type = 'submit' value = 'Go'
             </form>";
    return $result;
}    

function CreateOptionValues(array $valueArray)
{
     $result = "";
     foreach ($valueArray as $value)
     {
         $result = $result . "<option value='$value'>$value</option>";
     }
     return $result;
}

function CreateBikeTables($price)
{
    $bikeModel = new BikeModel();
    $bikeArray = $bikeModel->GetBikeByType($price);
    $result = "";
    
    foreach ($bikeArray as $key =>$bike)
    {
       $result = $result .
               "<table class = 'bikeTable'>
                 <tr>
                    <th rowspan='6' width = '150px'><img runat ='server' src ='$bike->image'/></th>
                     <th width = '75px'>Name: </th>
                     <td>$bike->name</td>
                         <td>
<a href='form.php'><font color='green'>Book</font><a/> 
</form>
</td>
</tr>
                 
                 
                 <tr>
                     <th>Cc: </th>
                     <td>$bike->cc</td>
                 </tr>
                 
                <tr>
                     <th>Price: </th>
                     <td>$bike->price</td>
                 </tr>
                 
                <tr>
                     <th>Mileage: </th>
                     <td>$bike->mileage</td>
                 </tr>
                 
                <tr> 
                 <td colspan='2' >$bike->review</td>
                </tr> 
                
            </table>" ;
    }
    return $result;
}
}

?>
    </body>
</html>