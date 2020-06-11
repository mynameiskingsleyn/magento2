<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Kings\FirstUnit\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     *
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        //Create first table
        $table = $installer->getConnection()
            ->newTable($installer->getTable('myTable'))
            ->addColumn(
                'mytable_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                3,
                ['primary' => true, 'identity' => true, 'nullable' => false, 'unsigned'=>true],
                'Mytable id'
            )->addColumn(
                'name',
                \Magento\FrameWork\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'NAME'
            )->setComment('Just for testin purpose');
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
