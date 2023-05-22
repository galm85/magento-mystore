<?php

namespace Codilar\Demo\Plugin;

class Product
{
    public function afterGetName(\Magento\Catalog\Model\Product $product, $name){

        $price = $product->getData('price');

        if($price < 60){
            $name .= 'So Cheap';
        }else{
            $name .= 'So Expensive';
        }

        return $name;
    }
}
