<?php
require('/home/pc/AkshanshPhp/Annotations/vendor/autoload.php');

/**
 * class subject is to hold function which is use to perform operation 
 * upon observer
 */
interface Subject
{
    function register(Observer $o);
    function unregister(Observer $o);
    function notifyObserver();
}

/**
 * Observer interface is to update information
 */
interface Observer
{
    function update($ibmPrice, $applePrice, $googlePrice);
}

/**
 * StockGrabber class which implements subject interface to ragister and unregister
 * Observer and notify the observer and set the stock price
 */
class StockGrabber implements Subject{

    //hold observer list
    private $observers;
    //stock price
    private $ibmPrice;
    private $applePrice;
    private $googlePrice;

    /**
     * constructor to make observer as list at the time of object creation of 
     * StockGrabber class
     */
    function __construct()
    {
        $this->observers = [];
    }

    /**
     * register is to add new observer to the list
     * 
     * @param Observer to register only observer type value
     */
    function register(Observer $newObserver){
        //push in the list
        array_push($this->observers,$newObserver);
    }

    /**
     * funtion unregister is to remove any observer from the list
     * 
     * @param Observer to unregister only observer type value
     */
    function unregister(Observer $deleteObserver){
        //search observer index
        $index = array_search($deleteObserver,$this->observers);
        //if it get any index value the remove the Observer
        if ($index !== false ) {
            unset($this->observers[$index]);
            echo "observer ".($index+1)." deleted\n";
            return;
        }
        throw new Exception("Observer bot found");
        
    }
    function notifyObserver(){

        foreach ($this->observers as $key ) {
            $key->update($this->ibmPrice, $this->applePrice, $this->googlePrice);
        }
    }

    function setIBMPrice($newIbmPrice)
    {
        $this->ibmPrice = $newIbmPrice;
        $this->notifyObserver();
    }
    
    function setApplePrice($newApplePrice)
    {
        $this->applePrice = $newApplePrice;
        $this->notifyObserver();
    }

    function setGooglePrice($newGooglePrice)
    {
        $this->googlePrice = $newGooglePrice;
        $this->notifyObserver();
    }
}

class StockObserver implements Observer{
    private $ibmPrice;
    private $applePrice;
    private $googlePrice;

    private static $observerIDTracker = 0;

    private $observerID;

    private $stockGrabber;

    function __construct(Subject $stockGrabber){
        $this->stockGrabber= $stockGrabber;
        $this->observerID = ++StockObserver::$observerIDTracker;

        echo "new Observer ".$this->observerID."\n";
        $stockGrabber->register($this);
    }

    function update($ibmPrice, $applePrice, $googlePrice){
        $this->ibmPrice = $ibmPrice;
        $this->applePrice = $applePrice;
        $this->googlePrice = $googlePrice;

        $this->printThePrices();
    }

    function printThePrices()
    {
        echo $this->observerID."\nIBM: ".$this->ibmPrice."\napple: ".$this->applePrice."\ngoogle: ".$this->googlePrice."\n";
    }
}

function main()
{
    $stockGrabber = new StockGrabber();
    $observer1 = new StockObserver($stockGrabber);

    $stockGrabber->setIBMPrice(190);
    $stockGrabber->setApplePrice(200);
    $stockGrabber->setGooglePrice(310);

    $observer2 = new StockObserver($stockGrabber);

    $stockGrabber->setIBMPrice(10);
    $stockGrabber->setApplePrice(20);
    $stockGrabber->setGooglePrice(30);

    // $stockGrabber->unregister($observer2);
    // echo "\niiiiiiiiiiiiiiiiiiiiiiiiiiiiiii\n";
    // $stockGrabber->setIBMPrice(10);
    // $stockGrabber->setApplePrice(20);
    // $stockGrabber->setGooglePrice(30);
}

main();
?>