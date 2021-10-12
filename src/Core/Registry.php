<?php

namespace Framework\Core;

use Framework\Layouts\Core\Registry as IRegistry;

/**
 * Webbiyotik registry class
 *
 * 
 * @package Webbiyotik
 * @license MIT
 * @copyright 2018
 */
abstract class Registry implements IRegistry
{
    /**
     * Keep objects.
     *
     * @var array $instances
     */
    public static $instances = [
        //
    ];

    /**
     * Return request object.
     *
     * @param  string $class
     * @return mixed
     */
    public static function get(String $class)
    {
        return isset(self::$instances[$class]) ? self::$instances[$class] : null;
    }

    /**
     * Set object.
     *
     * @param  string $name
     * @param  object $object
     * @return boolean|object
     */
    public static function set(String $name, $object)
    {
        if (!is_object($object)) return false;

        /* Check instance */
        if (empty(self::$instances[$name])) {
            self::$instances[$name] = $object;
            return self::$instances[$name];
        }

        return false;
    }
}
