<?php

use PHPUnit\Framework\TestCase;

class AppTest extends TestCase {

    public function testRenderWithError():void {
        $app = new \Vor\Core\App();
        $this->assertNotNull($app);
        $this->expectException(LogicException::class);
        $app->render();

        $app = new \Vor\Core\App('/some/url/request');
        $this->assertNotNull($app);
        $this->expectException(LogicException::class);
        $app->render();
    }

    public function testRender():void {
        $app = new \Vor\Core\App();
        $this->assertNotNull($app);
        $_SERVER['REQUEST_METHOD'] = "GET";
        $page = $app->render();
        var_dump($page);
    }
}