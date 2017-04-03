<?php 
//$str = '2011-11-31'; //invalid date, november has 30 days only 
function validaData($str) 
{ 
   if (!($str == '0000-00-00'))
   {    
        $stamp = strtotime($str); 

        if (!is_numeric($stamp)) 
        { 
            return false; 
        }

        //$month = date( 'm', $stamp ); 
        //$day   = date( 'd', $stamp ); 
        //$year  = date( 'Y', $stamp );

        $data = explode('-',$str); // fatia a string $dat em pedados, usando / como referência
        $year =    $data[0];
        $month =  $data[1];
        $day =   $data[2];


        if (checkdate($month, $day, $year)) 
        { 
            return true; 
        } 
    }else{
        return true;
    }
  return false; 
} 
?> 

