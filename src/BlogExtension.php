<?php

declare(strict_types=1);

namespace Archette\Blog;

use Doctrine\Common\Persistence\Mapping\Driver\MappingDriver;
use Nette\DI\CompilerExtension;
use Nette\DI\Definitions\ServiceDefinition;
use Rixafy\Blog\Category\BlogCategoryFacade;
use Rixafy\Blog\Category\BlogCategoryFactory;
use Rixafy\Blog\BlogFacade;
use Rixafy\Blog\BlogFactory;
use Rixafy\Blog\Post\BlogPostFacade;
use Rixafy\Blog\Post\BlogPostFactory;
use Rixafy\Blog\Publisher\BlogPublisherFacade;
use Rixafy\Blog\Publisher\BlogPublisherFactory;
use Rixafy\Blog\Tag\BlogTagFacade;
use Rixafy\Blog\Tag\BlogTagFactory;

class BlogExtension extends CompilerExtension
{
    public function beforeCompile(): void
    {
    	/** @var ServiceDefinition $serviceDefinition */
    	$serviceDefinition = $this->getContainerBuilder()->getDefinitionByType(MappingDriver::class);
        $serviceDefinition->addSetup('addPaths', [['vendor/rixafy/blog']]);
    }

    public function loadConfiguration(): void
    {
        $this->getContainerBuilder()->addDefinition($this->prefix('blogFacade'))
            ->setFactory(BlogFacade::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('blogPostFacade'))
            ->setFactory(BlogPostFacade::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('blogTagFacade'))
            ->setFactory(BlogTagFacade::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('blogPublisherFacade'))
            ->setFactory(BlogPublisherFacade::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('blogCategoryFacade'))
            ->setFactory(BlogCategoryFacade::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('blogFactory'))
            ->setFactory(BlogFactory::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('blogPublisherFactory'))
            ->setFactory(BlogPublisherFactory::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('blogCategoryFactory'))
            ->setFactory(BlogCategoryFactory::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('blogTagFactory'))
            ->setFactory(BlogTagFactory::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('blogPostFactory'))
            ->setFactory(BlogPostFactory::class);
    }
}
