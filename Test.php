
<?php
Class Test
{
    public $name;

    public $nameArray = array();
    public $evenNumbers = array();

    public function __construct($array) {
        
        ini_set('display_startup_errors', 1);
        ini_set('display_errors', 1);
        error_reporting(-1);
        $this->nameArray = $array;
    }

    // public function setName($name)
    // {
    //    $this->name = $name;
    // }

    public function displayEvenNumbers()
    {
      foreach($this->nameArray as $value) {
        if($value%2 == 0) {
        $this->evenNumbers[] = $value;
        }
      }
      print_r($this->evenNumbers);
    }
    
    // public function getName()
    // {
       
    //   return $this->name;
    // }


    
}
$obj = new Test(array(1,2,3,4,5,6));
//$obj->setName('test');
echo $obj->displayEvenNumbers();

?>
