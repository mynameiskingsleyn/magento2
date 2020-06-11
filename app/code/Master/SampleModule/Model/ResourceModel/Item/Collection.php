<?php

namespace Master\SampleModule\Model\ResourceModel\Item;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Master\SampleModule\Model\Item as ItemModel;
use Master\SampleModule\Model\ResourceModel\Item as ItemResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(
            ItemModel::class, ItemResource::class
        );
    }
}