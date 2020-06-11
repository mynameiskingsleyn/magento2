<?php

namespace Mastering\SampleModule\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;


class UpgradeSchema implements UpgradeSchemaInterface
{
    const TABLE_NAME = 'mastering_sample_item';
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $tableName = $setup->getTable(self::TABLE_NAME);
        $adapter = $setup->getConnection();
        $setup->startSetup();

        if(version_compare($context->getVersion(),'0.0.3','<')){
            $adapter->addColumn(
                $tableName,'description',
                [
                    'type'=>Table::TYPE_TEXT,
                    'nullable'=>true,
                    'comment' => 'Item Description'
                ]
            );
        }




        $setup->endSetup();
    }
}

