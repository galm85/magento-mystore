<?php

namespace Macademy\Blog\ViewModel;

use Macademy\Blog\Api\Data\PostInterface;
use Macademy\Blog\Api\PostRepositoryInterface;
use Macademy\Blog\Model\ResourceModel\Post\Collection;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Post implements  ArgumentInterface
{


    public function __construct(
        private Collection $collection,
        private PostRepositoryInterface $postRepository,
        private RequestInterface $request
    ){}


    public function getList():array{
        return $this->collection->getItems();
    }


    public function getPostsCount():int{
        return $this->collection->count();
    }


    public function getDetail():PostInterface{
        $id = (int) $this->request->getParam('id');
        return $this->postRepository->getById($id);
    }



}
