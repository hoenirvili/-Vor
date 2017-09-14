<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ErrorPageTest extends TestCase {

    public function testRenderWithEmptyParamas(): void {
        $this->expectException(InvalidArgumentException::class);
        \Vor\Core\ErrorPage::render();
    }

    public function testRender(): void {
        ob_start();
        $status = new \Vor\Http\StatusCode(
            \Vor\Http\StatusCode::INTERNAL_SERVER_ERROR);
        \Vor\Core\ErrorPage::render($status);
        $content = ob_get_clean();
        $this->assertNotNull($content);
        $this->assertNotEmpty($content);
    }

    public function testInternal(): void {
        ob_start();
        \Vor\Core\ErrorPage::internal();
        $content = ob_get_clean();
        $this->assertNotNull($content);
        $this->assertNotEmpty($content);
    }

    public function testNotFound(): void {
        ob_start();
        \Vor\Core\ErrorPage::notfound();
        $content = ob_get_clean();
        $this->assertNotNull($content);
        $this->assertNotEmpty($content);
    }

}