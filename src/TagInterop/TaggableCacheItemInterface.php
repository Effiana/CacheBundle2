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

use Psr\Cache\CacheItemInterface;
use Psr\Cache\InvalidArgumentException;

/**
 * An item that supports tags. This interface is a soon-to-be-PSR.
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 * @author Nicolas Grekas <p@tchwork.com>
 */
interface TaggableCacheItemInterface extends CacheItemInterface
{
    /**
     * Get all existing tags. These are the tags the item has when the item is
     * returned from the pool.
     *
     * @return array
     */
    public function getPreviousTags();

    /**
     * Overwrite all tags with a new set of tags.
     *
     * @param string[] $tags An array of tags
     *
     * @throws InvalidArgumentException When a tag is not valid.
     *
     * @return TaggableCacheItemInterface
     */
    public function setTags(array $tags);
}
