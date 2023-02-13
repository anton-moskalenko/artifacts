<?php

namespace Liloi\Interstate\Engine;

use Liloi\Interstate\API\Tree;
use Liloi\Interstate\Engine\Domain\Manager;
use Liloi\Config\Pool;
use Rune\Application\Conceptual as ConceptualApplication;

/**
 * @inheritDoc
 */
class Conceptual extends ConceptualApplication
{
    /**
     * Configuration data ppol.
     *
     * @var Pool
     */
    private Pool $config;

    /**
     * Application constructor.
     *
     * @param Pool $config Configuration data object.
     */
    public function __construct(Pool $config)
    {
        $this->config = $config;
        Manager::setConfig($config);
        Tree::collect();
    }

    /**
     * Gets configuration data object.
     *
     * @return Pool Configuration data object.
     */
    public function getConfig(): Pool
    {
        return $this->config;
    }
}