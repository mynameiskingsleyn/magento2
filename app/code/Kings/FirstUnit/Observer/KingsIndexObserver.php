<?php

namespace Kings\FirstUnit\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class KingsIndexObserver implements ObserverInterface
{
    public function __construct()
    {
    }

    public function execute(Observer $observer)
    {
        //echo 'Kings index observer called';  exit;
        $result = $observer->getData('myEventData');
        $result->getConfig()->getTitle()->set('Kings from Observer');
        return $result;
    }
}