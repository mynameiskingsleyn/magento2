<?php

namespace Kings\FirstUnit\Block;

//use Magento\Framework\View\Element\Template;

class Index extends \Magento\Framework\View\Element\Template
{

    public function __construct(\Magento\Framework\View\Element\Template\Context $context, array $data = [])
    {

        $this->setTemplate('Kings_FirstUnit::index.phtml');
        parent::__construct($context, $data);

    }

    public function someFunction()
    {
        return 'some functions';
    }

//    /**
//     * Get the full name of a customer
//     *
//     * @return string full name
//     */
//    public function getName()
//    {
//        return $this->_helperView->getCustomerName($this->getCustomer());
//    }
}