<?php

declare(strict_types=1);

namespace Archette\Blog;

class BlogExtension extends \Nette\DI\CompilerExtension
{
    public function loadConfiguration()
    {
        $this->compiler->loadConfig(__DIR__ . '/../config.neon');
    }
}