<?php

namespace Mastering\SampleModule\Controller\Adminhtml\Item;

use Magento\Framework\Controller\ResultFactory;

use Magento\Backend\App\Action;

class NewAction extends Action
{

    public function execute()
    {
        //echo "this is working!! "; exit;
        /**
         * @var \Magento\Framework\Controller\Result\Raw $result
         */
        $result = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $result;
    }
}
