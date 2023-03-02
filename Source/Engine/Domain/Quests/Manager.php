<?php

namespace Liloi\Nexus\Engine\Domain\Quests;

use Liloi\Nexus\Engine\Domain\Manager as DomainManager;

class Manager extends DomainManager
{
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'quests';
    }

    public static function loadCollection(?string $dt = null): Collection
    {
        if(is_null($dt))
        {
            $dt = date('Y-m-d 00:00:00');
        }

        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where start <= "%s" order by dt desc limit 100;',
            $name,
            date('Y-m-d 23:59:59', strtotime($dt))
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
            'select * from %s where key_quest="%s"',
            $name,
            $key
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_quest'];
        unset($data['key_quest']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_quest = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(): void
    {
        $row = [
            'title' => 'Enter the title',
            'start' => gmdate('Y-m-d H:-i:s'),
            'finish' => gmdate('Y-m-d H:-i:s'),
            'status' => Statuses::TODO,
            'type' => '1',
            'data' => '{}',
            'key_url' => $_SERVER['REQUEST_URI'] !== '/' ? $_SERVER['REQUEST_URI'] : '/map'
        ];

        $name = self::getTableName();
        self::getAdapter()->insert($name, $row);
    }
}