<!-- 
unserialize -->
<?php
class Palindrome
{
  public $nameArray=array();
  public $storeArray=array();
   
    public function __construct($array)
    {
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);
        $this->nameArray=$array;
    }
    public function checkPalindrome()
    {   
    $count=0;  
    $c=0;   
    foreach($this->nameArray as $value)
    {    
        if($value == strrev($value))
        {
          
           $count++;
           $c=$value;
        //    echo $c;
           print_r(explode(" ",$c));
           echo"<br>";
        }
        
    }     
  return $count;
 
    } 
   
    }    

$obj=new Palindrome(array('aba','malayalam','abc','bab','ddd','abcd'));
echo "Number of palindrome in the given array:".$obj->checkPalindrome();
?>