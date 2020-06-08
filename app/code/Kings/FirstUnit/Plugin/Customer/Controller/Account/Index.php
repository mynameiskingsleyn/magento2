<?php

namespace Kings\FirstUnit\Plugin\Customer\Controller\Account;

class Index
{
    /**
     * @var  \Magento\Customer\Model\Session
     */
    protected  $customerSession;

    public function __construct(\Magento\Customer\Model\Session $sessionSession)
    {
        $this->customerSession = $sessionSession;
    }

    public function afterExecute(\Magento\Customer\Controller\Account\Index $subject, $resultPage)
    {
        $resultPage->getconfig()->getTitle()->set(__('welcome back %l',$this->customerSession->getCustomer()
        ->getName()));
        return $resultPage;
    }
}