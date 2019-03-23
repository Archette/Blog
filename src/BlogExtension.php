<?php

declare(strict_types=1);

namespace Archette\Blog;

class BlogExtension extends \Nette\DI\CompilerExtension
{
    public function beforeCompile()
    {
        $this->getContainerBuilder()->getDefinitionByType(\Doctrine\Common\Persistence\Mapping\Driver\AnnotationDriver::class)
            ->addSetup('addPaths', [['vendor/rixafy/blog']]);
    }
}