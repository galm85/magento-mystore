<?php

namespace Codilar\Demo\Model;

use Codilar\Demo\Api\ProductRepositoryInterface;
use Codilar\Demo\Api\Data\ProductInterfaceFactory;
use Codilar\Demo\Helper\ProductHelper;
use Magento\TestFramework\Exception\NoSuchActionException;


class ProductRepository implements ProductRepositoryInterface
{

    private $productRepository;
    private $productInterfaceFactory;
    private $productHelper;


    public function __construct(
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        ProductInterfaceFactory $productInterfaceFactory,
        ProductHelper $productHelper
    )
    {
        $this->productInterfaceFactory = $productInterfaceFactory;
        $this->productHelper = $productHelper;
        $this->productRepository = $productRepository;
    }

    public function getProductById($id)
    {
        $productInterface = $this->productInterfaceFactory->create();

        try{
            $product = $this->productRepository->getById($id);
            $productInterface->setId($product->getId());
            $productInterface->setSku($product->getSku());
            $productInterface->setName($product->getName());
            $productInterface->setDescription($product->getDescription() ? $product->getDescription() : "" );
            $productInterface->setPrice($this->productHelper->formatPrice($product->getPrice()));
            $productInterface->setImages($this->productHelper->getProductImagesArray($product));
            $productInterface->setSpecialPrice($this->productHelper->formatPrice($product->getSpecialPrice()));
//            $productInterface->setPrice($product->getPrice());
//            $productInterface->setImages(['dasda','dsadas']);
            return $productInterface;

        }catch (NoSuchActionException $e){
            throw NoSuchActionException::singleField("id",$id);
        }
    }
}
