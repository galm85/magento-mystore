<?php

namespace Macademy\Blog\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\Controller\Result\Forward;

class Index implements HttpGetActionInterface
{

    public function __construct(
//        private RedirectFactory $redirectFactory,
          private ForwardFactory $forwardFactory,
    )
    {}

    public function execute():Forward
    {
        /** @var Forward $forward */
        $forward = $this->forwardFactory->create();
        return $forward->setController('post')->forward('list');
    }
}
