<?php declare(strict_types = 1);

namespace Vor\Views;

interface Renderer
{
    public function render(string $template, array $data = []) : string;
}