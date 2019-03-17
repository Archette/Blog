<?php

declare(strict_types=1);

namespace App\TestExtension;

class BlogExtension extends \Nette\DI\CompilerExtension
{
    public function loadConfiguration()
    {
        $this->compiler->loadConfig(__DIR__ . '/../config.neon');
    }
}