<?php

use PHPUnit\Framework\TestCase;

class AppTest extends TestCase {

    public function testRenderWithError():void {

        // test with empty url and empty REQUEST_METHOD
        $app = new \Vor\Core\App();
        $this->assertNotNull($app);
        $status = $app->render();
        $this->assertNotNull($status);
        $code = $status->code();
        $this->assertEquals($code, \Vor\Http\StatusCode::INTERNAL_SERVER_ERROR);

        // test with routes and empty RERQUEST_METHOD
        $routes = ['/hhhfdsh',
                '/asd/hdu/',
                '9923',
                'jidasgasd',
                '/uhud2213/1'];

        foreach ($routes as $route) {
             $app = new \Vor\Core\App();
            $this->assertNotNull($app);
            $status = $app->render();
            $this->assertNotNull($status);
            $code = $status->code();
            $this->assertEquals($code, \Vor\Http\StatusCode::INTERNAL_SERVER_ERROR);
        }

        // test with routes and REQUEST_METHOD FILLED
        $methods = ['GET', 'POST', 'PUT', 'DELETE'];

        $_SERVER['REQUEST_METHOD'] = "GET";
        foreach ($methods as $method) {
            foreach ($routes as $route) {
                $_SERVER['REQUEST_METHOD'] = $method;
                $app = new \Vor\Core\App();
                $this->assertNotNull($app);
                $status = $app->render();
                $this->assertNotNull($status);
                $code = $status->code();
                $this->assertEquals($code, \Vor\Http\StatusCode::NOT_FOUND);
            }
        }
    }

    public function testRender():void {

        $routes = ['/', '/index', '/about', '/article',
            '/archive', '/archive', '/login'];
        $_SERVER['REQUEST_METHOD'] = "GET";

        foreach ($routes as $route) {
            $app = new \Vor\Core\App($route);
            $this->assertNotNull($app);
            // this operation will echo the entire page, but we are just
            // interested in the return status, so we suppress the output
            ob_start();
            $status = $app->render();
            ob_end_clean();
            $code = $status->code();
            $this->assertEquals($code, \Vor\Http\StatusCode::OK);
        }
    }
}