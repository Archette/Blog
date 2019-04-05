<?php

declare(strict_types=1);

namespace Archette\Blog;

use Doctrine\Common\Persistence\Mapping\Driver\AnnotationDriver;
use Nette\DI\CompilerExtension;
use Rixafy\Blog\BlogCategory\BlogCategoryFacade;
use Rixafy\Blog\BlogCategory\BlogCategoryRepository;
use Rixafy\Blog\BlogDataFactory;
use Rixafy\Blog\BlogFacade;
use Rixafy\Blog\BlogFactory;
use Rixafy\Blog\BlogPost\BlogPostFacade;
use Rixafy\Blog\BlogPost\BlogPostRepository;
use Rixafy\Blog\BlogPublisher\BlogPublisherFacade;
use Rixafy\Blog\BlogPublisher\BlogPublisherRepository;
use Rixafy\Blog\BlogRepository;
use Rixafy\Blog\BlogTag\BlogTagFacade;
use Rixafy\Blog\BlogTag\BlogTagRepository;

class BlogExtension extends CompilerExtension
{
    public function beforeCompile()
    {
        $this->getContainerBuilder()->getDefinitionByType(AnnotationDriver::class)
            ->addSetup('addPaths', [['vendor/rixafy/blog']]);
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

        $this->getContainerBuilder()->addDefinition($this->prefix('blogDataFactory'))
            ->setFactory(BlogDataFactory::class);

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