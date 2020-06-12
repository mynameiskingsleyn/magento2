<?php

namespace Mastering\SampleModule\Cron;

use Mastering\SampleModule\Model\Config;

use Mastering\SampleModule\Model\ItemFactory;

class AddItem
{

    private $itemFactory;

    private $config;

    public function __construct(ItemFactory $factory, Config $config)
    {
        $this->itemFactory = $factory;
        $this->config = $config;
    }

    public function execute()
    {
        if($this->config->isEnabled()){
            $this->itemFactory->create()
                ->setName('Scheduled item')
                ->setDescription('Created at '. time())
                ->save();
        }
    }
}