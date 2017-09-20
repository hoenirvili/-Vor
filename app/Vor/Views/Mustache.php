<?php declare(strict_types = 1);

namespace Vor\Views;

use Mustache_Engine;

class Mustache implements Renderer
{
    private $engine;

    public function __construct(Mustache_Engine $engine)
    {
        $this->engine = $engine;
    }

    public function render(string $template, array $data = []): string
    {
        return $this->engine->render($template, $data);
    }
}