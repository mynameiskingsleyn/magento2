<?php

namespace Mastering\SampleModule\Block;

use Magento\FrameWork\View\Element\Template;

use Mastering\SampleModule\Model\ResourceModel\Item\Collection;
use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory; // we use collection factory to avoid using collection

class Hello extends Template
{
    private $collectionFactory;
    public function __construct(Template\Context $context, CollectionFactory $collectionFactory, array $data = [])
    {
       // echo "mastering block is working"; exit();
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
        //echo "hear me yall"; exit();
    }

    /**
     * @return \Mastering\SampleModule\Model\Item[]
     */
    public function getItems()
    {
        //echo "in getItems yall!!"; exit();
        //return null;
        return $this->collectionFactory->create()->getItems(); // getItems is magemto magic function to get items of a model
    }
}