<?php
class Palindrome_me
{
    public $nameArray;
    public function __construct($array)
    {
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL); 
        $this->nameArray=$array;
    }

public function ArraySort()
{
    $length=0;
    $count=0; 
    foreach($this->nameArray as $key=>$value)
    {
    if(strlen($value)>0)
    {
        $length=strlen($value);
        $reverse='';
      
      for($i=$length-1;$i>=0;$i--)
        {
         $reverse.=$value[$i];
        }

         if($reverse == $value)
         {
         $count++;
         echo $value . " is palindrome" . "<br><br>";
         }
         else
         {
           unset($this->nameArray[$key]);
         
          
         }
         
    }
 }
  echo "Total number of palindrome in the array:".$count;
}
}
$obj=new Palindrome_me(array("malayalam","hai","wow","dad","mom","hello","ZOOZ"));
$obj->ArraySort();

?>