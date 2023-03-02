<?php

namespace Liloi\Nexus\Engine\Domain\Quests;

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
}