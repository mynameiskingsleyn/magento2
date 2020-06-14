<?php

namespace Mastering\SampleModule\Controller\Adminhtml\Item;

//use Magento\Framework\Controller\ResultFactory;

use Mastering\SampleModule\Model\ItemFactory;

use Magento\Backend\App\Action;

class Save extends Action
{
    private $itemFactory;

    public function __construct(\Magento\Backend\App\Action\Context $context,
        ItemFactory $itemFactory)
    {
        $this->itemFactory = $itemFactory;
        parent::__construct($context);

    }
    public function execute()
    {
        //echo 'inside saver construct'; exit;
        $this->itemFactory->create()
                        ->setData($this->getRequest()->getPostValue()['general'])
                        ->save();
        return $this->resultRedirectFactory->create()->setPath('mastering/index/index');
    }
}
