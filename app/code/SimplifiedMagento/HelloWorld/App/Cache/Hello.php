<?php

namespace SimplifiedMagento\HelloWorld\App\Cache;

use Magento\Framework\App\Cache\Type\FrontendPool;
use Magento\Framework\Cache\Frontend\Decorator\TagScope;
use Magento\Framework\Config\CacheInterface;

class Hello extends TagScope implements CacheInterface
{

    const TYPE_IDENTIFIER = 'hello';
    const CACHE_TAG = 'HELLO';


    public function __construct(FrontendPool $frontend)
    {
        parent::__construct($frontend->get(self::TYPE_IDENTIFIER),self::CACHE_TAG);
    }
}
