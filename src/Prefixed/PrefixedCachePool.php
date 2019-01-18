<?php
/**
 * This file is part of the Effiana package.
 *
 * (c) Effiana, LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Dominik Labudzinski <dominik@labudzinski.com>
 */
declare(strict_types=0);

namespace Effiana\CacheBundle\Prefixed;

use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;
/**
 * Prefix all cache items with a string.
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
class PrefixedCachePool implements CacheItemPoolInterface
{
    use PrefixedUtilityTrait;
    /**
     * @type CacheItemPoolInterface
     */
    private $cachePool;

    /**
     * @param CacheItemPoolInterface $cachePool
     * @param string $prefix
     */
    public function __construct(CacheItemPoolInterface $cachePool, $prefix)
    {
        $this->cachePool = $cachePool;
        $this->prefix = $prefix;
    }

    /**
     * {@inheritdoc}
     */
    public function getItem($key)
    {
        $this->prefixValue($key);
        return $this->cachePool->getItem($key);
    }

    /**
     * {@inheritdoc}
     */
    public function getItems(array $keys = [])
    {
        $this->prefixValues($keys);
        return $this->cachePool->getItems($keys);
    }

    /**
     * {@inheritdoc}
     */
    public function hasItem($key)
    {
        $this->prefixValue($key);
        return $this->cachePool->hasItem($key);
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        return $this->cachePool->clear();
    }

    /**
     * {@inheritdoc}
     */
    public function deleteItem($key)
    {
        $this->prefixValue($key);
        return $this->cachePool->deleteItem($key);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteItems(array $keys)
    {
        $this->prefixValues($keys);
        return $this->cachePool->deleteItems($keys);
    }

    /**
     * {@inheritdoc}
     */
    public function save(CacheItemInterface $item)
    {
        return $this->cachePool->save($item);
    }

    /**
     * {@inheritdoc}
     */
    public function saveDeferred(CacheItemInterface $item)
    {
        return $this->cachePool->saveDeferred($item);
    }

    /**
     * {@inheritdoc}
     */
    public function commit()
    {
        return $this->cachePool->commit();
    }
}
