<?php session_start();?>

<!DOCTYPE html>
<html lang="en-US">
<head>

<link rel="stylesheet" href="hotels.css" type="text/css">
</head>
<body>
<div>
<?php
   
         $userObject = new User($_SESSION['name_s'],  $_SESSION['surname_s'], $_SESSION['email_s'], $_SESSION['checkIn_s'], $_SESSION['checkOut_s'], $_SESSION['hotels']);
         
		 $year = $userObject -> getYears();
		 $_SESSION['year'] = $year;
		 $month = $userObject -> getMonths();
		 $_SESSION['month'] = $month;
		 $day = $userObject -> getDays();
		 $_SESSION['day'] = $day;
		 $_SESSION['nod'] = $userObject -> getNum_of_days($month, $day, $year);
         echo $userObject -> getUser();
         echo $userObject -> getCheckInDate();
         echo $userObject -> getCheckOutDate();
         
         echo $userObject -> getHotels();
         
         $_SESSION['ci'] = $userObject -> getCheckInDate();
         $_SESSION['co'] = $userObject -> getCheckOutDate();
		
		 $_SESSION['hotel_cost'] = $userObject -> hotel_cost;
		 $_SESSION['array'] = $userObject -> hotelInfo_array;
		 
    
    class User
    {
        public $name, $surname, $email, $checkInDate, $checkOutDate, $non, $hotelInfo_array, $hotel_cost, $hotel_array, $cim, $cid, $ciy ,$com, $cod, $coy= '';
        
        function __construct($name, $surname, $email, $cid, $cod, $hotel_array)
        {
            $this -> name = $name;
            $this -> surname = $surname;
            $this -> email = $email;
            $this -> checkInDate = $cid;
            $this -> checkOutDate = $cod;
            $this -> hotel_array = $hotel_array;
            
        }
        
        function getUser()
        {
            return "<div id=\"user\"><ul><li>Name: ".$this -> name."</li><li>Surname: ".$this -> surname."</li><li>Email: ".$this -> email."</li></ul>";
        }
        
        function getCheckInDate()
        {
            $checkIn = date('l-d-F', $this -> checkInDate);
            return "Check In Date: ".$checkIn."<br>";
        }
        
       
        function getCheckOutDate()
        {
            $checkOut = date('l-d-F', $this -> checkOutDate);
            return "Check Out Date: ".$checkOut."<br></div>";
        }
        
        function getDays()
        {
            $this -> cid = date('d', $this -> checkInDate);
            $this -> cod = date('d', $this -> checkOutDate);
            
            if($this -> cid > $this -> cod)
            {
                $new_cid =  $this -> cid - $this -> cod;
                return (($this -> cod + $new_cid) - $new_cid);
            }else{
                return ($this -> cod - $this -> cid);
            }
        }
        
        function getMonths()
        {
            $this -> cim = date('m', $this -> checkInDate);
            $this -> com = date('m', $this -> checkOutDate);
            
            if($this -> cim > $this -> com)
            {
                $new_cim =  $this -> cim - $this -> com;
                return (($this -> com + $new_cim) - $new_cim);
            }else{
                return ($this -> com - $this -> cim);
            }
        }
        
        
        function getYears()
        {
            $this -> ciy = date('Y', $this -> checkInDate);
            $this -> coy = date('Y', $this -> checkOutDate);
            return ($this -> coy - $this -> ciy);
            
        }
        
        function getNum_of_days($m, $d, $y)
        {
            if($y > 0 && $m > 0 && $d > 0)
            {
                return $y. " year(s) ".$m." month(s), ".$d." day(s)";
            }
            
            else if($y <= 0 && $m > 0 && $d > 0)
            {
                return $m." month(s), ".$d." day(s)";
            }
            
            else if($y <= 0 && $m <= 0 && $d > 0)
            {
                return $d;
            }
            else {
                return "invalid date was submitted";
            }
        }
        
        function getHotels()
        {
            $this -> hotel_cost = array( 
                'Park Inn by Radisson Cape Town Foreshore' => array(
                    'total' => 850
                ),
                
                'Mandela Rhodes Place Hotel' => array(
                    'total'  => 1600
                ),
				
                'Icon Luxury Apartments' => array(
                    'total' => 1250
                ),
				
               
            );
			
			foreach($this -> hotel_cost as $key => $array)
			{
				foreach( $array as $second_key => $value)
				{
					if($_SESSION['year'] > 1)
					{
						$_SESSION['money'] = (365 +  $_SESSION['month'] + $_SESSION['day'])* $value;
					}else
					{
						$_SESSION['money'] = ($_SESSION['month'] + $_SESSION['day'] )* $value;  
					}
				}
			}
		
			
            $this -> hotelInfo_array = array( 
                'Radison Blu Sandton' => array(
                    '<div class="div_hotel"><table cellspacing="10"><tr><th scope="row">Hotel Name: </th>' => "<td>Radison Blu Sandton</tr></td>",
                    
					'<tr><th scope="row">Number Of Days: </th>' => "<td>".$_SESSION['nod']."</td></tr>",
                    '<tr><th scope="row">Daily Rate</th>' => "<td> R850 </td></tr>",
					'<tr><th scope="row">Total</th>' => "<td>".$_SESSION['money']."</td></tr></table></div>"
                ),
                
                'Houghton Hotel' => array(
                    '<div class="div_hotel"><table cellspacing="10"><tr><th scope="row">Hotel Name: </th>' => "<td>Houghton Hotel</td></tr>",
					'<tr><th scope="row">Number Of Days: </th>' => "<td>".$_SESSION['nod']."</td></tr>",
                    '<tr><th scope="row"> Daily Rate </th>' => "<td> R1600 </td></tr></table></div>",
                    '<tr><th scope="row">Total</th>' => "<td>".$_SESSION['money']."</td></tr></table></div>"
                ),
                'The Hilton Hotel' => array(
                    '<div class="div_hotel"><table cellspacing="10"><tr><td>Hotel Name: </td>' => "<td>The Hilton Hotel</td></tr>",
					'<tr><th scope="row">Number Of Days: </th>' => "<td>".$_SESSION['nod']."</td></tr>",
                    '<tr><th scope="row"> Daily Rate </th>' => "<td> R1250 </td></tr></table></div>",
                    '<tr><th scope="row">Total</th>' => "<td>".$_SESSION['money']."</td></tr></table></div>"
                    
                
            ));
            
           $temp = implode(',', $this -> hotel_array);
           $this -> hotel_array = explode(',', $temp);
           
           foreach($this -> hotelInfo_array as $hotel_key => $value)
           {
               
               foreach($this -> hotel_array as $hotel_value_j)
               {
                   
                   if($hotel_key == $hotel_value_j)
                    {
                        foreach($value as $value_key => $this_val)
                        {
                            
 echo <<<_END
<div>
<ul><li>$value_key $this_val</li></ul>
</div>
 
_END;
                            
                        }
                    }
                    
               }
           }
        }
        
    }
?>

<div id="form">
<p>
<form action="cart.php" method="POST">

<select name="hotel" size="1" >
<?php 
    


foreach ($_SESSION['hotels'] as $val)
{
    
?>
<option value="<?php echo $val; ?>"><?php echo $val; ?></option>
<?php 
}
?>
</select>
</p>
<p>
<input type="submit" value="Book Now">

</p>
</form>
</div>
 

</div>
</body>
</html>  