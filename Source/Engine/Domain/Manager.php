<?php

namespace Liloi\Nexus\Engine\Domain;

use Liloi\Config\Pool;
use Liloi\Tools\Data\MySql\Adapter;
use Liloi\Tools\Data\MySql\Connection;
use Liloi\Tools\Manager as AbstractManager;

class Manager extends AbstractManager
{
    /**
     * Configuration data ppol.
     *
     * @var Pool
     */
    static private Pool $config;

    /**
     * Database adapter.
     *
     * @var Adapter|null
     */
    static private ?Adapter $adapter = null;

    /**
     * Gets configuration data object.
     *
     * @return Pool Configuration data object.
     */
    public static function getConfig(): Pool
    {
        return static::$config;
    }

    /**
     * Sets configuration data object.
     * @param Pool $config
     */
    public static function setConfig(Pool $config): void
    {
        static::$config = $config;
    }

    /**
     * Get config database table prefix.
     *
     * @return string
     */
    public static function getTablePrefix(): string
    {
        return self::getConfig()->get('prefix');
    }

    /**
     * Get database adapter (lazy).
     *
     * @return Adapter
     */
    public static function getAdapter(): Adapter
    {
        if(is_null(self::$adapter))
        {
            $connection = self::getConfig()->get('connection');

            self::$adapter = Adapter::create(Connection::create(
                $connection['host'],
                $connection['user'],
                $connection['database'],
                $connection['password']
            ));

            // @todo: check for errors.

            // @todo: include database config into adapter.
            mysqli_set_charset(self::$adapter->getConnection()->get(), 'UTF8');
        }

        return self::$adapter;
    }
}