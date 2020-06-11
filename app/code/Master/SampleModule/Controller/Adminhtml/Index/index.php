<?php

namespace Master\SampleModule\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;

use Magento\Backend\App\Action;

class Index extends Action
{

    public function execute()
    {
        echo "controller works"; exit;
        /**
         * @var \Magento\Framework\Controller\Result\Raw $result
         */
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setContent('Hello Admin World');
        return $result;
    }
}
