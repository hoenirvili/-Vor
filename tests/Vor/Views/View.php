<?php declare(statis_types=1);

use PHPUnit\Framework\TestCase;

class ViewTest extends TestCase {
    public function testHtml(): void {
        $view = new \Vor\Views\View();
        $this->assertNotNull($view);
        $page = $view->html();
        $this->assertNotNull($page);
        $this->assertNotEmpty($page);


        $view = new \Vor\Views\View([
            "some"      => "new",
            "things"    => "to",
            "test"      => null,
        ]);
        $this->assertNotNull($view);
        $page = $page->html('article');
        $this->assertNotNull($page);
        $this->assertNotEmpty($page);
    }
}