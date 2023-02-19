<?php

namespace Liloi\Rune\Engine\Domain\Map;

use Liloi\Rune\Engine\Domain\Manager as DomainManager;

class Manager extends DomainManager
{
    public static function getTableName(): string
    {
        return 'rune_map';
    }

    public static function load(string $url): Entity
    {
//        $url = str_replace("/blueprint", "", $url); // Temporary solution
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where url="%s"',
            $name, $url
        ));

        if(!$row)
        {
            $row = [
                'url' => $url,
                'title' => 'Enter the title',
                'program' => '// Enter the program'
            ];

            self::create($row);
        }

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_rune'];
        unset($data['key_rune']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_rune = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create($row): void
    {
        $name = self::getTableName();
        self::getAdapter()->insert($name, $row);
    }
}