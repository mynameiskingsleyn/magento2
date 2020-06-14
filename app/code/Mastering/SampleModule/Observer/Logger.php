<?php

namespace Mastering\Sample\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class Logger implements ObserverInterface
{
    private $logger;
    public function __construct( LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        //$myEventData = $observer->getData('mastering_command');
        $this->logger->debug(
          $observer->getEvent()->getObject()->getName()   // getObject is a magic method for the key we used in the data
        );

    }
}