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

namespace Effiana\CacheBundle\TagInterop;

use Psr\Cache\CacheItemPoolInterface;
use Psr\Cache\InvalidArgumentException;

/**
 * Interface for invalidating cached items using tags. This interface is a soon-to-be-PSR.
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 * @author Nicolas Grekas <p@tchwork.com>
 */
interface TaggableCacheItemPoolInterface extends CacheItemPoolInterface
{
    /**
     * Invalidates cached items using a tag.
     *
     * @param string $tag The tag to invalidate
     *
     * @throws InvalidArgumentException When $tags is not valid
     *
     * @return bool True on success
     */
    public function invalidateTag($tag);

    /**
     * Invalidates cached items using tags.
     *
     * @param string[] $tags An array of tags to invalidate
     *
     * @throws InvalidArgumentException When $tags is not valid
     *
     * @return bool True on success
     */
    public function invalidateTags(array $tags);

    /**
     * {@inheritdoc}
     *
     * @return TaggableCacheItemInterface
     */
    public function getItem($key);

    /**
     * {@inheritdoc}
     *
     * @return array|\Traversable|TaggableCacheItemInterface[]
     */
    public function getItems(array $keys = []);
}
