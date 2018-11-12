<?php
/**
 * class is to check the number of object is created 
 */
class A{
    //counter to count the value of constructor
    private $count = 0;
    //save is to hold the class object
    public static $save;
    /**
     * constructor of class A
     */
    private function A()
    {
        //increase the value of counter
        $this->count++;
        echo $this->count."\n";
    }

    /**
     * getInstance is to get the object of the class 
     * 
     * @return object of the class
     */
    public function getInstance()
    {
        //object hold in the save
        A::$save = new A();
        return A::$save;
    }

    /**
     * check is to print string value
     */
    public function check(String $str) 
    {
        echo $str."\n";
    }
}


/**
 * class b is to run the main class and check the values
 */
class B{
    /**
     * main function 
     */
    function main()
    {
        //object of class A
        $o1 = A::getInstance();
        //run check function
        $o1->check("akku");
        $o1->check("____");
        //get object of class A
        $o2 = A::getInstance();
        //run check funtion 
        $o1->check("verma");

    }
}

B::main();
?>