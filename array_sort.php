

<?php  
class array_sort  
{   
    public $temp;
    public function __construct()
    {
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);
    }
        public function arsort(array $sorted)  
     {  
        for($i=0; $i<count($sorted)-1; $i++){
            for($j=$i+1; $j<count($sorted); $j++){
                if($sorted[$i] > $sorted[$j]){
                    $temp =  $sorted[$i];
                    $sorted[$i] = $sorted[$j];
                    $sorted[$j] = $temp;
                }
            }
        } 
        return $sorted;  
      }  
}  
$sortarray = new array_sort();  
print_r($sortarray->arsort(array(25,4,58,1,36,9,5)));  
?> 

