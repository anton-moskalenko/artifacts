<?php

namespace Liloi\Rune\Engine\Domain\Ticket;

use Liloi\Tools\Entity as AbstractEntity;

/**
 * @todo: add tests
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_ticket');
    }

    public function getTitle(): string
    {
        return $this->getField('title');
    }

    public function setTitle(string $value): void
    {
        // @todo Extract param names to const.
        $this->data['title'] = $value;
    }

    public function getDate(): string
    {
        return date('Y-m-d', strtotime($this->getStart()));
    }

    public function getStartTime(): string
    {
        return date('H:i:s', strtotime($this->getStart()));
    }

    public function getFinishTime(): string
    {
        return date('H:i:s', strtotime($this->getFinish()));
    }

    public function getStart(): string
    {
        return $this->getField('start');
    }

    public function setStart(string $value): void
    {
        // @todo Extract param names to const.
        $this->data['start'] = $value;
    }

    public function getFinish(): string
    {
        return $this->getField('finish');
    }

    public function setFinish(string $value): void
    {
        // @todo Extract param names to const.
        $this->data['finish'] = $value;
    }

    public function getStatus(): string
    {
        return $this->getField('status');
    }

    public function getStatusString(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    public function getStatusClass(): string
    {
        return str_replace(' ', '-', strtolower($this->getStatusString()));
    }

    public function setStatus(string $value): void
    {
        // @todo Extract param names to const.
        $this->data['status'] = $value;
    }

    public function getType(): string
    {
        return $this->getField('type');
    }

    public function getTypeString(): string
    {
        return Types::$list[$this->getType()];
    }

    public function getTypeClass(): string
    {
        return str_replace(' ', '-', strtolower($this->getTypeString()));
    }

    public function setType(string $value): void
    {
        // @todo Extract param names to const.
        $this->data['type'] = $value;
    }

    public function getData(): string
    {
        return $this->getField('data');
    }

    public function setData(string $value): void
    {
        // @todo Extract param names to const.
        $this->data['data'] = $value;
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