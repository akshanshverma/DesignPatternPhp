<?php
/**
 * class Socket which hold constant volt
 */
class Socket
{
    /**
     * function getVolt is to return volt value
     * 
     * @return volt value
     */
    function getVolt()
    {
        return 120;
    }
}

/**
 * interface hold the outpot method
 */
interface SocketAdapter
{
    function get120Volt();
    function get12Volt();
    function get3Volt();
}

/**
 * class socketAdapter need Socket for volt value and socket adapter for output volt
 */
class SocketClassAdapterImpl extends Socket implements SocketAdapter
{
    /**
     * function get120Volt return 120 volt
     * 
     * @return 120 volt
     */
    function get120Volt()
    {
        return $this->getVolt();
    }
    /**
     * function get12Volt return 12 volt
     * 
     * @return 12 volt
     */
    function get12Volt()
    {
        return $this->getVolt() / 10;
    }
    /**
     * function get3Volt return 3 volt
     * 
     * @return 3 volt
     */
    function get3Volt()
    {
        return $this->getVolt() / 40;
    }
}

/**
 * Mobile which need charge 
 */
class Mobile{
    function charge(int $input){
        if ($input == 3) {
            echo "charging.....\n";
        } else {
            echo "not charging.....\n";
        }
        
    }
}

/**
 * main method 
 */
function main(){
    $st = new SocketClassAdapterImpl();
    $mobile = new Mobile();
    $mobile->charge($st->get3Volt());  
}

main();
?>