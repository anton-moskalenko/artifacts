<?php

namespace Liloi\Artifacts\Engine\Domain\Quests;

use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getStart()
 * @method void setStart(string $value)
 * @method string getFinish()
 * @method void setFinish(string $value)
 * @method string getStatus()
 * @method void setStatus(string $value)
 * @method void setTitle(string $value)
 * @method void setProgram(string $value)
 * @method void setUrl(string $value)
 * @method string getType()
 * @method void setType(string $value)
 * @method void setData(string $value)
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

    public function isVirtual(): bool
    {

        return isset($this->data['virtual']);
    }

    public function getVirtual(string $key)
    {
        return $this->data['virtual'][$key];
    }

    public function getTypeCaption(): string
    {
        return Types::$list[$this->getType()];
    }

    public function getStatusCaption(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    public function getStatusClass(): string
    {
        $status = strtolower($this->getStatusCaption());
        return str_replace(' ', '-', $status);
    }

    public function save(): void
    {
        Manager::save($this);
    }
}