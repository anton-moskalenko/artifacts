<?php

namespace Liloi\Interstate\Engine\Domain\Ticket;

use Liloi\Road\Library\Data\Adapter;
use Liloi\Artifact\Engine\Domain\Manager as DomainManager;

class Manager extends DomainManager
{
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'tickets';
    }

    public static function loadCollection($key_map): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_rune="%s" order by key_artifact asc;',
            $name,
            $key_map
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $key): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_artifact="%s"',
            $name, $key
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_artifact'];
        unset($data['key_artifact']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_artifact = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(string $keyMap): void
    {
        $row = [
            'title' => 'Enter the title',
            'summary' => 'Enter the summary',
            'status' => '1',
            'type' => '1',
            'local' => '-',
            'global' => '-',
            'data' => '{}',
            'key_rune' => $keyMap
        ];

        $name = self::getTableName();
        self::getAdapter()->insert($name, $row);
    }
}