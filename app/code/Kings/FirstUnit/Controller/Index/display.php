<?php

namespace Kings\FirstUnit\Controller\Index;

use Magento\Framework\App\Action\Context;

class Display extends \Magento\Framework\App\Action\Action
{

    protected $_pageFactory;
    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $pageFactory )
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {

        return $this->_pageFactory->create();
    }
}