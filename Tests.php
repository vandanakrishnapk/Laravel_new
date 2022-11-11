<?php
class Tests
{
    public $nameArray=array();
    
    public function __construct($array) {
        ini_set('display_startup_errors',1);
        ini_set('disply_errors',1);
        error_reporting(-1);
        $this->nameArray=$array;
    }
    public function checkPalindrome(){
        $count=0;
        $length=0;
        foreach($this->nameArray as $value){
            if(strlen($value)>0){
                $length=strlen($value);
                $reverse='';
                for($i=$length-1;$i>=0;$i--){
                    $reverse.=$value[$i];
                }
                if($value == $reverse){
                    $count++;
                    echo $value."<br>";
                }
            }
           
        }
        print_r ($count);
    }
}
$obj=new Tests(array('abc','aba','abba','abcd','mam'));
echo $obj->checkPalindrome();
?>