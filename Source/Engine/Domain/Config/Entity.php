<?php

namespace Liloi\Rune\Engine\Domain\Config;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * @todo: add tests
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_config');
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

    public function getDataList(): array
    {
        return json_decode($this->getData(), true);
    }

    public function setDataList(array $value): void
    {
        $this->setData(json_encode($value, JSON_UNESCAPED_UNICODE));
    }
}