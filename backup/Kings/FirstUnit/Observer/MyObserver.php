<?php

namespace Kings\FirstUnit\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class MyObserver implements ObserverInterface
{

    public function __construct()
    {
    }

    public function execute(Observer $observer)
    {
        $myEventData = $observer->getData('myEventData');
        echo $myEventData.' has been updated'; exit;
    }
}