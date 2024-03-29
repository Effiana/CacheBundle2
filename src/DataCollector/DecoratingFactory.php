<?php

/*
 * This file is part of php-cache\cache-bundle package.
 *
 * (c) 2015 Aaron Scherer <aequasi@gmail.com>, Tobias Nyholm <tobias.nyholm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Effiana\CacheBundle\DataCollector;

use Nyholm\NSA;
use Psr\Cache\CacheItemPoolInterface;

/**
 * A factory that decorates another factory to be able to use the proxy cache.
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
class DecoratingFactory
{
    /**
     * @type ProxyFactory
     */
    private $proxyFactory;

    /**
     * @param ProxyFactory $proxyFactory
     */
    public function __construct(ProxyFactory $proxyFactory)
    {
        $this->proxyFactory = $proxyFactory;
    }

    /**
     * @param CacheItemPoolInterface $originalObject original class
     *
     * @return CacheProxyInterface
     */
    public function create($originalObject)
    {
        $proxyClass = $this->proxyFactory->createProxy(get_class($originalObject));
        $reflection = new \ReflectionClass($proxyClass);
        $pool       = $reflection->newInstanceWithoutConstructor();

        // Copy properties from original pool to new
        foreach (NSA::getProperties($originalObject) as $property) {
            NSA::setProperty($pool, $property, NSA::getProperty($originalObject, $property));
        }

        return $pool;
    }
}
