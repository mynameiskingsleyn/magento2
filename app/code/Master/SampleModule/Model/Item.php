<?php

namespace Master\SampleModule\Model;

use Magento\Framework\Model\AbstractModel; // we can also use AbstractExtensibleModel. but we dont need that now

class Item extends AbstractModel
{
    protected function _construct() //phpcs:ignore Magento2.CodeAnalysis.EmptyBlock
    {
        $this->_init(\Master\SampleModule\Model\ResourceModel\Item::class);
    }
}