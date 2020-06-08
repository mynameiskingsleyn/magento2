<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Kings\FirstUnit\Setup;

//use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

/**
 * UpgradeSchema mock class
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    const UPDATE_TABLE = 'myTable_upgrade';
    /**
     * {@inheritdoc}
     *
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.1') < 0) {
            $tableName = $setup->getTable(self::UPDATE_TABLE);
            $table = $setup->getConnection()->newTable($tableName)
                            ->addColumn(
                                'mytable_id',
                                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                                null,
                                ['identity'=>true,'unsigned'=>true, 'primary'=>true, 'nullable'=>false],
                                'MyTable id'
                            )->addColumn(
                                'name',
                                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                                255,
                                    [],
                            'Name'
                            )->setComment('mytable upgrade');

            $setup->getConnection()->createTable($table);


        }

        $setup->endSetup();
    }
}
