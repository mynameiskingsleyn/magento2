<?php

namespace Mastering\SampleModule\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\DB\Ddl\Table;


class UpgradeData implements UpgradeDataInterface
{
    const TABLE_NAME = 'mastering_sample_item';
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $tableName = $setup->getTable(self::TABLE_NAME);
        $adapter = $setup->getConnection();
        $setup->startSetup();

        if(version_compare($context->getVersion(),'0.0.2','<')){
            $adapter->Update(
              $tableName,
              [
                  'description'=>'Default description'
              ],
              $adapter->quoteInto('id = ?',1)
            );
        }




        $setup->endSetup();
    }
}