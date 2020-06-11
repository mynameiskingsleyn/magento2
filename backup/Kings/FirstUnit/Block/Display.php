<?php

namespace Kings\FirstUnit\Block;

use Magento\Framework\View\Element\Template;

class Display extends Template
{
    protected $_postFactory;
    public function __construct(\Magento\Framework\View\Element\Template\Context $context, array $data = [],
    \Kings\FirstUnit\Model\PostFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
        parent::__construct($context, $data);
        //echo "I was picked"; exit;
        //$this->setTemplate('Kings_FirstUnit::sayhello.phtml');
    }

    public function sayHello()
    {
        return __('Hello World');
    }

    public function getPostCollection()
    {
        $post = $this->_postFactory->create();
        return $post->getCollection();
    }
}