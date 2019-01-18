<?php

/*
 * This file is part of php-cache\cache-bundle package.
 *
 * (c) 2015 Aaron Scherer <aequasi@gmail.com>, Tobias Nyholm <tobias.nyholm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Effiana\CacheBundle\Factory;

use Effiana\CacheBundle\Bridge\SymfonyValidatorBridge;
use Effiana\CacheBundle\Cache\FixedTaggingCachePool;
use Effiana\Prefixed\PrefixedCachePool;
use Effiana\Taggable\TaggablePSR6PoolAdapter;
use Psr\Cache\CacheItemPoolInterface;

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
class ValidationFactory
{
    /**
     * @param CacheItemPoolInterface $pool
     * @param array                  $config
     *
     * @return SymfonyValidatorBridge
     */
    public static function get(CacheItemPoolInterface $pool, array $config)
    {
        if ($config['use_tagging']) {
            $pool = new FixedTaggingCachePool(TaggablePSR6PoolAdapter::makeTaggable($pool), ['validation']);
        }

        if (!empty($config['prefix'])) {
            $pool = new PrefixedCachePool($pool, $config['prefix']);
        }

        return new SymfonyValidatorBridge($pool);
    }
}