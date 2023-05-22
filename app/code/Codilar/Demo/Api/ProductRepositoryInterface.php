<?php

namespace Codilar\Demo\Api;

use Codilar\Demo\Api\Data\ProductInterface;

interface ProductRepositoryInterface
{

    /**
     * @param int $id
     * @return ProductInterface
     */
    public function getProductById($id);
}
