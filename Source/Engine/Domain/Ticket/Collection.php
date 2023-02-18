<?php

namespace Liloi\Interstate\Engine\Domain\Ticket;

use Liloi\Tools\Collection as AbstractCollection;

/**
 * @todo: add tests
 * @todo: add docs
 * @package Engine\Domain\Exercise
 */
class Collection extends AbstractCollection
{
    public function getPeriod(): string
    {
        $total = 0;

        foreach($this as $entity)
        {
            $total += $entity->getPeriodUnix();
        }

        $all_minute = $total / 60;

        $hours = (int)($total / 3600);
        $minutes = (int)(($total % 3600) / 60);
        $seconds = (int)(($total % 3600) % 60);
        $percent = (int)(100 * ($all_minute / (24 * 60)));

        return sprintf('(%s) %s:%s:%s (%s%%)', $total, $hours, $minutes, $seconds, $percent);
    }

    public function groupCount(): array
    {
        $list = array_combine(array_keys(Types::$list), [0,0,0,0,0,0,0]);

        foreach($this as $entity)
        {
            $list[$entity->getType()]++;
        }

        return $list;
    }

    public function group(): array
    {
        $group = [];

        for($i=0;$i<24;$i++)
        {
            $group[str_pad($i, 2, '0', STR_PAD_LEFT)] = [];
        }

        return $group;
    }
}