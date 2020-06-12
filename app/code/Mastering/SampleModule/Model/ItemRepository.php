<?php

namespace Mastering\SampleModule\Model;

use Mastering\SampleModule\Api\ItemRepositoryInterface;

//use Mastering\SampleModule\Api\Data\ItemInterface;
use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory;

class ItemRepository implements ItemRepositoryInterface
{
    private $collectionFactory;
    public function __construct(CollectionFactory $collection)
    {
        $this->collectionFactory = $collection;
    }

    public function getList()
    {
        //return http_response_code(200);
        $items = $this->collectionFactory->create()->getItems();
        return $items;
    }
}