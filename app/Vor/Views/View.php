<?php declare(strict_types=1);

namespace Vor\Views;

use Vor\Core\Config;

class View {

    private $pages;

    private $name = 'index';

    private $params = [];

    public function __construct(array $params = []) {
        $config = Config::get();
        $this->pages = $config['pages'];
        $this->params = $params;
    }

    public function html(string $name=''): string {
        if ($name === '')
            $name = $this->name;

        ob_start();
        $this->scope($this->pages[$name], $this->params);
        return ob_get_clean();
    }

    private function scope(string $template, array $data): void {
            extract($data);
            require($template);
    }

    public function render(string $name=''):void {
        $page = $this->html($name);
        echo $page;
    }
}