<?php

namespace Liloi\Rune\Engine\Domain\Map;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;
use Liloi\Rune\Engine\Domain\Map\Manager as MapManager;
use Liloi\Rune\Engine\Domain\Config\Manager as ConfigManager;

/**
 * @todo: add tests
 */
class Entity extends AbstractEntity
{
    public static function getCurrent(): self
    {
        $url_current = $_SERVER['REQUEST_URI'];

        $url = ConfigManager::load('url');
        $data = $url->getDataList();
        if($url_current === '/')
        {
            $url_current = $data['url'];
        }
        else
        {
            $data['url'] = $url_current;
            $url->setDataList($data);
            ConfigManager::save($url);
        }

        return MapManager::load($url_current);
    }

    public function getKey(): string
    {
        return $this->getField('key_url');
    }

    public function getRID(): string
    {
        return str_replace('/', ':', ltrim($this->getKey(), '/'));
    }

    public function getURL(): string
    {
        return $this->getField('url');
    }

    public function setURL(string $value): void
    {
        // @todo Extract param names to const.
        $this->data['url'] = $value;
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

    public function getProgram(): string
    {
        return $this->getField('program');
    }

    public function getParse(): string
    {
        $parse = Parser::parseString($this->getProgram());
//        $parse = str_replace("href='", "href='/blueprint", $parse); // Temporary solution
        return $parse;
    }

    public function setProgram(string $value): void
    {
        // @todo Extract param names to const.
        $this->data['program'] = $value;
    }

    public function save(): void
    {
        MapManager::save($this);
    }
}