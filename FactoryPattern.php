<?php
require("Utility.php");
/**
 * Computer factory is to create the object of pc server and laptop
 */
class ComputerFactory
{

    /**
     * function getComputer is to get the object which user want
     * 
     * @return object of computer type
     */
    public function getComputer($n)
    {
        switch ($n) {
            //return server
            case 1:
                echo "your server is ready" . "\n";
                return new Server("16gb","1tb","i5-3rd");
                break;
            //return Pc
            case 2:
                echo "your PC is ready" . "\n";
                return new PC("4gb","120gb","i5-3rd");
                break;
            //return laptop
            case 3:
                echo "your Laptop is ready" . "\n";
                return new Laptop("8gb","120gb","i5-3rd");
                break;

            default:
                echo "invalid input";
                break;
        }
    }
}
interface Computer
{
    function ram();
    function ssd();
    function cpu();
}
class Server implements Computer
{
    public $ram;
    public $ssd;
    public $cpu;
    function Server($ram,$ssd,$cpu)
    {
        $this->ram = $ram;
        $this->ssd= $ssd;
        $this->cpu = $cpu;
    }

    function ram(){
        return $this->ram;
    }
    function ssd(){
        return $this->ssd;
    }
    function cpu(){
        return $this->cpu;
    }
}
class PC implements Computer
{
    public $ram;
    public $ssd;
    public $cpu;
    function PC($ram,$ssd,$cpu)
    {
        $this->ram = $ram;
        $this->ssd= $ssd;
        $this->cpu = $cpu;
    }

    function ram(){
        return $this->ram;
    }
    function ssd(){
        return $this->ssd;
    }
    function cpu(){
        return $this->cpu;
    }
}
class Laptop implements Computer
{
    public $ram;
    public $ssd;
    public $cpu;
    function Laptop($ram,$ssd,$cpu)
    {
        $this->ram = $ram;
        $this->ssd= $ssd;
        $this->cpu = $cpu;
    }

    function ram(){
        return $this->ram;
    }
    function ssd(){
        return $this->ssd;
    }
    function cpu(){
        return $this->cpu;
    }
}
/**
 * main runnner
 */
function main()
{
    //object of factory class
    $cf = new ComputerFactory();
    echo "press\n1. server\n2. PC\n3. Laptop\n";
    //get object 
    $obj = $cf->getComputer(Utility::getInt());

    $ref = new ReflectionObject($obj);
    echo "\nProperties name\n";
    foreach ($ref->getProperties() as $key) {
        echo $key->getName()."\n";
    }

}
main();
?>