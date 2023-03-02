<?php

namespace Liloi\Nexus\Engine\Domain\Quests;

use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getStart()
 * @method void setStart(string $value)
 * @method string getFinish()
 * @method void setFinish(string $value)
 *
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_quest');
    }

    public function getPeriod(): string
    {
        $date1 = new \DateTime($this->getStart());
        $date2 = new \DateTime($this->getFinish());
        $interval = $date1->diff($date2);
        return $interval->format("%h:%i:%s");
    }

    public function getPeriodUnix(): int
    {
        return strtotime($this->getFinish()) - strtotime($this->getStart());
    }

    public function save(): void
    {
        Manager::save($this);
    }
}