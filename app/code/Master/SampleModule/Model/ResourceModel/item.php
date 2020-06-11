<?php

namespace Master\SampleModule\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Master\SampleModule\Setup\UpgradeData as Upgrade; // this class is not needed just using for table name

class Item extends AbstractDb
{
   public function _construct()
   {
       $this->_init(Upgrade::TABLE_NAME,'id');
   }
   
}