<?php

namespace Kings\FirstUnit\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $eventData = "Testing Car door";
        //echo $eventData;
        $this->_eventManager->dispatch('my_module_event_after',['myEventData'=>$eventData]);
        //echo "Testing testing"; exit;
    }
}