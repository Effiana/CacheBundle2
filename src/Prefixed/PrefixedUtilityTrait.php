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


/**
 * Utility to reduce code suplication between the Prefixed* decoratrs.
 *
 * @author ndobromirov
 */
trait PrefixedUtilityTrait
{
    /**
     * @type string Prefix to use for key namespaceing.
     */
    private $prefix;
    /**
     * Add namespace prefix on the key.
     *
     * @param array $keys Reference to the key. It is mutated.
     */
    private function prefixValue(&$key)
    {
        $key = $this->prefix.$key;
    }
    /**
     * Adds a namespace prefix on a list of keys.
     *
     * @param array $keys Reference to the list of keys. The list is mutated.
     */
    private function prefixValues(array &$keys)
    {
        foreach ($keys as &$key) {
            $this->prefixValue($key);
        }
    }
}
