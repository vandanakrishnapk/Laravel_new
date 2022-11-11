<?php
function Check_Palindrome($arr){   
    $temp = $arr;   
    $rev = 0;   
    while (floor($temp)) {   
        $d = $temp % 10;   
        $rev = $rev * 10 + $d;   
        $temp = $temp/10;   
    }   
    if ($rev == $arr){   
        return 1;   
    } 
    else{ 
        return 0; 
    } 
}   
  
//Check Palindrome
$palindrome = array(131, 1771, 1589, 'MALAYALAM','WOW', 'DAD'); 
foreach($palindrome as $p)
{
	if(Check_Palindrome($p))
    {   
		echo $p." is a Palindrome"."<br>"; 
        print_r(explode(" ",$p));  
	}  
   
	else {   
		echo $p." is not a Palindrome.<br/>";   
	} 
}
?>