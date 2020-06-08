<?php

namespace Kings\FirstUnit\Controller\Dummy;

use Magento\Framework\App\Action\Action;

class Dummy extends Action
{
    public function execute()
    {
        // TODO: Implement execute() method.
        echo $this->myfunction()."dummy"; exit;
    }

    public function myfunction()
    {
        return "my function ";
    }
}