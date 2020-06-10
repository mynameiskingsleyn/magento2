<?php

namespace Master\SampleModule\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    const TABLE_NAME = 'mastering_sample_item';
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $tableName = $setup->getTable(self::TABLE_NAME);
        $table = $setup->getConnection()
                        ->newTable(
                            $setup->getTable($tableName)
                        )
                        ->addColumn(
                            'id',
                            Table::TYPE_INTEGER,
                            null,
                            ['primary'=>true, 'identity'=>true, 'nullable'=>false]
                        )->addColumn(
                           'name',
                           Table::TYPE_TEXT,
                           255,
                           ['nullable'=>false],
                           'Item Name'
                        )->addIndex($setup->getIdxName($tableName,['name']),
                            ['name']
                        )->setComment(
                            'Sample Items');
        $setup->getConnection()->createTable($table);


        $setup->endSetup();
    }
}