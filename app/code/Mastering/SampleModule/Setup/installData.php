<?php

namespace Mastering\SampleModule\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class installData implements InstallDataInterface
{
    const TABLE_NAME = 'mastering_sample_item';
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $tableName = self::TABLE_NAME;
        $table = $setup->getTable($tableName);
        $adapter = $setup->getConnection();
        $setup->startSetup();

        $adapter->insert(
            $table,
            ['name'=>'Item 1']
        );
        $adapter->insert(
            $table,
            ['name'=>'Item 2']
        );
        $adapter->insert(
            $table,
            ['name'=>'Item 3']
        );

        $setup->endSetup();
    }
}