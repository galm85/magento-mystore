<?php


namespace Macademy\Blog\Controller\Post;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

class ListAction implements HttpGetActionInterface
{

    public function __construct(private PageFactory $pageFactory){}

    public function execute()
    {
        return $this->pageFactory->create();
    }
}
