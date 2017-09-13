<?php

use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase {
    public function testGet():void {
        $config = \Vor\Core\Config::get();
        $this->assertNotNull($config);
        $this->assertTrue(is_array($config));
    }

    public function testValidate():void {
        \Vor\Core\Config::validate();
        $this->assertTrue(true);
    }
}

