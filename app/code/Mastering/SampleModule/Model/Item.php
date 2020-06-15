<?php

namespace Mastering\SampleModule\Model;

use Magento\Framework\Model\AbstractModel; // we can also use AbstractExtensibleModel. but we dont need that now

class Item extends AbstractModel
{
    protected $_eventPrefix = 'mastering_sample_item';
    protected function _construct() //phpcs:ignore Magento2.CodeAnalysis.EmptyBlock
    {
        $this->_init(\Mastering\SampleModule\Model\ResourceModel\Item::class);
    }
}