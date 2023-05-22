<?php

namespace SimplifiedMagento\CustomAdmin\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Index extends Action
{

    private $scopeConfig;

    public function __construct(Context $context,ScopeConfigInterface $scopeConfig)
    {
        parent::__construct($context);
        $this->scopeConfig = $scopeConfig;
    }


    public function execute()
    {
        echo '<pre>';
        echo $this->scopeConfig->getValue('Firstsection/Firstgroup/Firstfield');
        print_r($this->scopeConfig->getValue('Firstsection/Firstgroup/Thirdfield'));
    }
}
