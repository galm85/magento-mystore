<?php

namespace Codilar\Demo\Helper;

use Magento\Framework\Pricing\Helper\Data;
class ProductHelper
{

    private $priceHelper;


    public function __construct(Data $priceHelper)
    {
        $this->priceHelper = $priceHelper;
    }

    public function formatPrice($price){
        return $this->priceHelper->currency($price,true,false);
    }

    public function myFormatPrice($price){

        $formatPrice = number_format($price,2);

        return "$".$formatPrice;
    }

    public function getProductImagesArray($product){
        $images = $product->getMediagalleryImages();
        $imagesArray = [];
        foreach ($images as $image){
            $imagesArray[] = $image->getUrl();
        }

        return $imagesArray;
    }



}
