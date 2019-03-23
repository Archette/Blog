<?php

declare(strict_types=1);

namespace Archette\Blog;

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

class BlogExtension extends \Nette\DI\CompilerExtension
{
    public function beforeCompile()
    {
        $this->getContainerBuilder()->getDefinitionByType(\Doctrine\Common\Persistence\Mapping\Driver\AnnotationDriver::class)
            ->addSetup('addPaths', [['vendor/rixafy/blog']]);
    }

    public function loadConfiguration()
    {
        $this->getContainerBuilder()->addDefinition($this->prefix('rixafy.blogFacade'))
            ->setFactory(BlogFacade::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('rixafy.blogPostFacade'))
            ->setFactory(BlogPostFacade::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('rixafy.blogTagFacade'))
            ->setFactory(BlogTagFacade::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('rixafy.blogPublisherFacade'))
            ->setFactory(BlogPublisherFacade::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('rixafy.blogCategoryFacade'))
            ->setFactory(BlogCategoryFacade::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('rixafy.blogFactory'))
            ->setFactory(BlogFactory::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('rixafy.blogDataFactory'))
            ->setFactory(BlogDataFactory::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('rixafy.blogRepository'))
            ->setFactory(BlogRepository::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('rixafy.blogPostRepository'))
            ->setFactory(BlogPostRepository::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('rixafy.blogTagRepository'))
            ->setFactory(BlogTagRepository::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('rixafy.blogPublisherRepository'))
            ->setFactory(BlogPublisherRepository::class);

        $this->getContainerBuilder()->addDefinition($this->prefix('rixafy.blogCategoryRepository'))
            ->setFactory(BlogCategoryRepository::class);
    }
}