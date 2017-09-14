<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Vor\Controllers\Controller;

class ControllerTest extends TestCase {

    public function testController(): void {
        $controller = new Controller(null);
        $this->assertNotNull($controller);
        $this->assertNotEmpty($controller);

        ob_start();
        $controller->render();
        $content = ob_get_clean();
        $this->assertNotNull($content);
        $this->assertNotEmpty($content);
    }
}