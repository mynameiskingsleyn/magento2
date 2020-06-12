<?php

namespace Kings\FirstUnit\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    public function __construct(Context $context, PageFactory $resultPageFactory )
    {

        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;

    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
//        $resultPage->getConfig()->getTitle()->set('New page titls here');
        $this->_eventManager->dispatch('kings_index_after',['myEventData'=>$resultPage]);
        return $resultPage;
        //$resultPage = $this->resultPageFactory->create();
        //$resultPage->addHandle('kings_index_temp'); // add a template from controller.
        //$resultPage->getConfig()->getTitle()->set('Another page title');
        //return $resultPage;



        /***** load content of PHTLM directly ***Really helpfully for JSON using JsonFactory ******/
//        $myPHTMLFile = $this->_view->getLayout()->createBlock(
//            \Kings\FirstUnit\Block\Index::class
//        )->setTemplate('index.phtml')->toHtml();
//        echo $myPHTMLFile.'<br/>';

        /**** Load content of static block directory ****/
//        $blockContent = $this->_view->getLayout()->createBlock('Magento\Cms\Block\Block')
//                                    ->setBlockId('fb')
//                                    ->toHtml();
//        echo $blockContent; //exit;
        /****** another great one is load and render layout no need for PageFactory ********/
        //$this->_view->loadLayout();
        //$this->_view->renderLayout();

    }
}