<?php

namespace Codilar\Demo\Block;

use Magento\CatalogInventory\Api\StockRegistryInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;

class StockLeft extends Template{

    private $registry;
    private $stockRegistry;

    public function __construct(Template\Context $context,

                                Registry $registry,
                                StockRegistryInterface $stockRegistry,
                                array $data = [],
    )
    {

        $this->registry = $registry;
        $this->stockRegistry = $stockRegistry;
        parent::__construct($context, $data);
    }



    public function getDate(){
        return (date('Y-m-d'));
    }

    public function getRemainingQty(){
        $product = $this->getCurrentProduct();
        $stock = $this->stockRegistry->getStockItem($product->getId());
        return $stock->getQty();
    }






    protected function getCurrentProduct(){
        return $this->registry->registry('product');
    }

    public function getModel(){
        $product = $this->getCurrentProduct();
        return $product->getData('model');
    }



}
