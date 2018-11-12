<?php
/**
 * class Test is to check the condition of singletone
 */
class Test
{
    //counter to check the count of object creat
    private $count = 0;
    //to hold the ocject of the class
    private static $save;

    private function Test()
    {
        $this->count++;
        echo $this->count . "\n";
    }

    //function to print value
    public function check($s)
    {
        echo $s . "\n";
    }

    // to get thi instance of the class 
    public function getInstance()
    {
        //if save dnt have any value the it will creat the object of the class
        // and save it
        if (Test::$save == null) {
            Test::$save = new Test();
        }
        return Test::$save;
    }
}

/**
 * class Test2 is to run the Test class and check the number of boject created 
 */
class Test2 
{
    function main()
    {
        //call object 1st time
        $a = Test::getInstance();
        $a->check("akku");
        $a->check("tata");
        //call object 2nd time
        $b = Test::getInstance();
        $b->check("verma");
        
    }  
}
Test2::main();
?>