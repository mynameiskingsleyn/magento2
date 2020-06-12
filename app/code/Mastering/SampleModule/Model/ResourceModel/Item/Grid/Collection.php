<?php

namespace Mastering\SampleModule\Model\ResourceModel\Item\Grid;

//use Magento\Framework\Data\{
//    Collection\Db\FetchStrategyInterface as FetchStrategy,
//    Collection\EntityFactoryInterface as EntityFactory,
//};
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface as FetchStrategy;
use Magento\Framework\Data\Collection\EntityFactoryInterface as EntityFactory;
use Mastering\SampleModule\Setup\UpgradeData;
use Magento\Framework\Event\ManagerInterface as EventManager;
use Psr\Log\LoggerInterface as Logger;
use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

class Collection extends SearchResult
{
    public function __construct(
        EntityFactory $entityFactory, Logger $logger, FetchStrategy $fetchStrategy, EventManager $eventMagager,
        $mainTable = UpgradeData::TABLE_NAME,
        $resourceModel = 'Mastering\SampleModule\Model\ResourceModel\Item'
    )
    {
        //echo 'collection works!!'; exit;
        parent::__construct($entityFactory,$logger,$fetchStrategy,$eventMagager,$mainTable,$resourceModel);
    }
}