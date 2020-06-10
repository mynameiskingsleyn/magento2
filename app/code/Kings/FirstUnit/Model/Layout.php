<?php

namespace Kings\FirstUnit\Model;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Zend\Log;
use \Psr\Log\LoggerInterface as systemLogger;
use Kings\FirstUnit\Logger\Logger as myLogger;

class Layout implements ObserverInterface
{
    protected $_logger;
    public function __construct(systemLogger  $logger)
    {
        $this->_logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $xml = $observer->getEvent()->getLayout()->getXmlString();
//        $writer = new \Zend\Log\Writer\Stream(BP.'/var/log/layout_block.xml');
//        $logger = new \Zend\Log\Logger();
        //$logger->addWriter($writer);
//        $logger =
//        $logger->info($xml);
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/templog.xml');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
       // $logger->info($xml);
        //return $this;
    }
}