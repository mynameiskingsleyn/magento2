<?php

namespace Mastering\SampleModule\Ui;

use Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{
    protected $collection;

    public function __construct($name, $primaryFieldName, $requestFieldName, $collectionFactory,
        array $meta = [], array $data = [])
    {
        //echo "we made it here"; exit;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }

    public function getData()
    {

        //return parent::getData(); //
        $result = [];
        foreach($this->collection->getItems() as $item){
            $result[$item->getId()]['general'] = $item->getData();
        }
        //var_dump($result); exit;
        return $result;
    }
}