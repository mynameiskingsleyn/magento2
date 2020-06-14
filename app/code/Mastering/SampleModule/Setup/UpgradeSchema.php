<?php

namespace Mastering\SampleModule\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;


class UpgradeSchema implements UpgradeSchemaInterface
{
    const TABLE_NAME = 'mastering_sample_item';
    const ORDER_TABLE_GRID = 'sales_order_grid';
    const LAST_MODEL = '1.0.5';
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $tableName = $setup->getTable(self::TABLE_NAME);
        $adapter = $setup->getConnection();
        $last_model =
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

        if(version_compare($context->getVersion(),self::LAST_MODEL, '<')){
            $adapter->addColumn(
                $setup->getTable(self::ORDER_TABLE_GRID),
                'base_tax_amount',
                [
                    'type'=>Table::TYPE_DECIMAL,
                    'comment'=> 'Base Tax Amount'
                ]
            );
        }




        $setup->endSetup();
    }
}

