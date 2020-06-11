<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Kings\FirstUnit\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

/**
 * Class UpgradeData
 * @package Magento\TestSetupDeclarationModule7\Setup
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * {@inheritdoc}
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $adapter = $setup->getConnection();
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.3') < 0) {
            $adapter->insertArray('myTable_upgrade',['mytable_id','name'],[[1,'Johnman'],[2,'Paulo']]);

            //Insert into myTable_upgrade (mytable_id,name) values((1,'johnman),(2,'something'))
            //$adapter->insertArray('myTable_upgrade', ['name'], ['John', 'James', 'Paul']);
        }

        $setup->endSetup();
    }
}