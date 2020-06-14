<?php

namespace Mastering\SampleModule\Console\Command;

//use Symfony\Component\Console\Command\Command;
use Magento\Framework\Event\ManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\{
    Command\Command,
    Input\InputArgument,
    Input\InputInterface,
    Output\OutputInterface,
};
//use Symfony\Component\Console\Input\InputArgument;
//use Symfony\Component\Console\Input\InputInterface;
//use Symfony\Component\Console\Output\OutputInterface;

use Mastering\SampleModule\Model\ItemFactory;
use Magento\Framework\Console\Cli;

class AddMoreItem extends Command
{
    const INPUT_KEY_NAME = 'name';
    const INPUT_KEY_DESCTIPTION = 'description';
    const NAME ='mastering:moreitem:add';

    private $itemFactory;
    private $eventManager;

    public function __construct(ItemFactory $itemFactory, ManagerInterface $eventManager)
    {
        $this->eventManager = $eventManager;
        $this->itemFactory = $itemFactory;
        parent:: __construct();
    }

    protected function configure()
    {
        $this->setName(self::NAME)
            ->addArgument(
                self::INPUT_KEY_NAME,
                InputArgument::REQUIRED,
                'Item name'
            )->addArgument(
                self::INPUT_KEY_DESCTIPTION,
                InputArgument::OPTIONAL,
                'Item description'
            );

        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $item = $this->itemFactory->create();
        $item->setName($input->getArgument(self::INPUT_KEY_NAME));
        $item->setDescription($input->getArgument(self::INPUT_KEY_DESCTIPTION));
        $item->setIsObjectNew(true);
        $item->save();
        $this->eventManager->dispatch('mastering_command',['object'=>$item]);

        return Cli::RETURN_SUCCESS;

    }
}