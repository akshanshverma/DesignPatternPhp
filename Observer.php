<?php
interface Subject
{
    function register(Observer $o);
    function unregister(Observer $o);
    function notifyObserver();
}

interface Observer
{
    function update($ibmPrice, $applePrice, $googlePrice);
}

class StockGrabber implements Subject{

    private $observers;
    private $ibmPrice;
    private $applePrice;
    private $googlePrice;

    function __construct()
    {
        $this->observers = [];
    }

    function register(Observer $newObserver){
        array_push($this->observers,$newObserver);
    }

    function unregister(Observer $deleteObserver){
        $index = array_search($deleteObserver,$this->observers);
       
        if ($index !== false ) {
            unset($this->observers[$index]);
            echo "observer ".($index+1)." deleted\n";
        }
        
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