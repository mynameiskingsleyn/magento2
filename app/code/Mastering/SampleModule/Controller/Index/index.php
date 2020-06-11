<?php

namespace Mastering\SampleModule\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Framework\App\Action\Action
{

    public function execute()
    {
        //echo "we are working!!!!"; exit();
        /**
         * @var \Magento\Framework\Controller\Result\Raw $result
         */
        //$result = $this->resultFactory->create(ResultFactory::TYPE_RAW);// this will ignore all layers and templates
        $result = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        //$result->setContents('Hello World!!');
        return $result;
    }
}