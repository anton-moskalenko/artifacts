<?php

namespace Liloi\Artifacts\Engine\Domain\Quests;

use Liloi\Artifacts\Engine\Domain\Manager as DomainManager;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'quests';
    }

    public static function loadCollection(?string $gmt_timestamp = null): Collection
    {
        if(is_null($gmt_timestamp))
        {
            $gmt_timestamp = gmdate('Y-m-d 00:00:00');
        }

        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where start between "%s" and "%s" order by start desc limit 100;',
            $name,
            date('Y-m-d 00:00:00', strtotime($gmt_timestamp)),
            date('Y-m-d 23:59:59', strtotime($gmt_timestamp))
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
        $name = self::getTableName();
        $key_quest_previous = self::getAdapter()->getSingle(sprintf(
            'select key_quest from %s order by start desc limit 1',
            $name
        ));

        $key_quest = gmdate('Y:W:N:0');

        if($key_quest_previous)
        {
            list($old_year, $old_week, $old_day, $old_ticket) = explode(':', $key_quest_previous);
            list($new_year, $new_week, $new_day, $new_ticket) = explode(':', $key_quest);

            if($old_year == $new_year && $old_week == $new_week && $old_day == $new_day)
            {
                $new_ticket = $old_ticket + 1;
            }

            $key_quest = implode(':', [$new_year, $new_week, $new_day, $new_ticket]);
        }

        $name = self::getTableName();
        self::getAdapter()->insert($name, [
            'key_quest' => $key_quest,
            'title' => 'Enter the title',
            'program' => '// comment',
            'url' => 'https://liloi.com.ua',
            'start' => gmdate('Y-m-d H:i:s'),
            'finish' => gmdate('Y-m-d H:i:s'),
            'status' => Statuses::TODO,
            'type' => Types::PROTOCOLS,
            'data' => '{}'
        ]);
    }

    public static function group(): array
    {
        $name = self::getTableName();

        $group = [];

        for($delta=0;$delta<=72;$delta++)
        {
            $key_dt = gmdate('y-m-d-H', strtotime("-$delta hour"));
            $group[$key_dt] = [];
            $group[$key_dt][] = Entity::create([
                'virtual' => [
                    'time' => gmdate('G', strtotime("-$delta hour"))
                ]
            ]);
        }

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where start between "%s" and "%s" order by start asc limit 100;',
            $name,
            gmdate('Y-m-d H:i:s', strtotime('-72 hour')),
            gmdate('Y-m-d H:i:s'),
        ));

        foreach ($rows as $row)
        {
            $key_dt = date('y-m-d-H', strtotime($row['start']));
            array_unshift($group[$key_dt], Entity::create($row));
        }

        return $group;
    }
}