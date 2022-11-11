
<?php
class Sort
{
  public $nameArray=array();
  
    public function __construct()
    {
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL); 
       
    }
    public function arraySort(array $value)
    {
     for($i=0;$i<count($value)-1;$i++)
            {
                for($j=$i+1;$j<count($value);$j++)
                {
                    if($value[$i]>$value[$j])
                    {
                    $temp=$value[$i];
                    $value[$i]=$value[$j];
                    $value[$j]=$temp;
                    }
                }
            }
        
return $value;

    }
   
}

$obj=new Sort();
echo "<pre>";
print_r($obj->arraySort(array(5,63,44,7,1,23,56,4)));
echo "</pre";
?>