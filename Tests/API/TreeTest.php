<?php

namespace Liloi\Nexus\API;

use PHPUnit\Framework\TestCase;

/**
 * Check phpUnit testing ability.
 */
class TreeTest extends TestCase
{
    /**
     * Tests true is indeed true :-)
     */
    public function testCollect(): void
    {
        $this->assertNull(Tree::$manager);
        Tree::collect();
        $this->assertNotNull(Tree::$manager);
    }
}