<?php

declare(strict_types=1);

namespace Archette\Blog;

use Doctrine\Common\Persistence\Mapping\Driver\AnnotationDriver;
use Nette\DI\CompilerExtension;
use Nette\DI\Definitions\ServiceDefinition;
use Rixafy\Blog\Category\BlogCategoryFacade;
use Rixafy\Blog\Category\BlogCategoryRepository;
use Rixafy\Blog\BlogFacade;
use Rixafy\Blog\BlogFactory;
use Rixafy\Blog\Post\BlogPostFacade;
use Rixafy\Blog\Post\BlogPostRepository;
use Rixafy\Blog\Publisher\BlogPublisherFacade;
use Rixafy\Blog\Publisher\BlogPublisherRepository;
use Rixafy\Blog\BlogRepository;
use Rixafy\Blog\Tag\BlogTagFacade;
use Rixafy\Blog\Tag\BlogTagRepository;

class BlogExtension extends CompilerExtension
{
    public function beforeCompile()
    {
    	/** @var ServiceDefinition $serviceDefinition */
    	$serviceDefinition = $this->getContainerBuilder()->getDefinitionByType(AnnotationDriver::class);
        $serviceDefinition->addSetup('addPaths', [['vendor/rixafy/blog']]);
    }

    public function loadConfiguration()
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

        $this->getContainerBuilder()->addDefinition($this->prefix('blogRepository'))
            ->setFactory(BlogRepository::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('blogPostRepository'))
            ->setFactory(BlogPostRepository::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('blogTagRepository'))
            ->setFactory(BlogTagRepository::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('blogPublisherRepository'))
            ->setFactory(BlogPublisherRepository::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('blogCategoryRepository'))
            ->setFactory(BlogCategoryRepository::class);
    }
}