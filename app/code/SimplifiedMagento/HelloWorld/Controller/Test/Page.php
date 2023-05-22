<?php

namespace SimplifiedMagento\HelloWorld\Controller\Test;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Page extends Action
{

    protected $pageFactory;

    public function __construct(Context $context,PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {
       return $this->pageFactory->create();
    }
}
