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


// function main()
// {
//     $ref = new ReflectionClass("A");

//     print_r($ref->newInstance());
// }
// $instance1 = A::getInstance();
// print_r($instance1);
// $instance2 = B::createInstanceWithoutConstructor("A");
// print_r($instance2);


?>