<?php
class A
{
    private $count = 0;
    public static $save;
    private function A()
    {
        $this->count++;
        echo $this->count . "\n";
    }


    public function getInstance()
    {
        A::$save = new A();
        return A::$save;
    }

    public function check($str)
    {
        echo $str . "\n";
    }
}
/*
class B
{

    function createInstanceWithoutConstructor(string $class)
    {
        $reflector = new ReflectionClass($class);
        $properties = $reflector->getProperties();
        $defaults = $reflector->getDefaultProperties();


        $serealized = "O:" . strlen($class) . ":\"$class\":" . count($properties) . ':{';
        foreach ($properties as $property) {
            $name = $property->getName();

            if ($property->isProtected()) {
                $name = chr(0) . '*' . chr(0) . $name;
            } elseif ($property->isPrivate()) {
                $name = chr(0) . $class . chr(0) . $name;
            }
            $serealized .= serialize($name);
            if (array_key_exists($property->getName(), $defaults)) {
                $serealized .= serialize($defaults[$property->getName()]);
            } else {
                $serealized .= serialize(null);
            }
        }
        $serealized .= "}";

        return unserialize($serealized);
    }
}
*/

function main()
{
    $obj1 = A::getInstance();
    $obj1->check("verma");
    echo "1st obj address: ".spl_object_hash($obj1)."\n";
    
    $ref = new ReflectionClass("A");
    $cons = $ref->getConstructor();
    $cons->setAccessible(true);
    $obj = $ref->newInstanceWithoutConstructor();
    $cons->invoke($obj, 0);
    $obj->check("akku");
    echo "2nd obj address: ".spl_object_hash($obj)."\n";
    
}
// $instance1 = A::getInstance();
// print_r($instance1);
// $instance2 = B::createInstanceWithoutConstructor("A");
// print_r($instance2);

main();
?>