# Blog
📝 CRUD model [rixafy/blog](https://github.com/Rixafy/Blog) ported to Nette Framework.

# Installation
```
composer require archette/blog
```

Add extension to your neon configuration
```neon
extensions:
    archette.blog: Archette\Blog\BlogExtension
```

Then you will have injected all services in DI, advanced blog configuration will be released soon (posts per page configuration, etc)

It's recommended to use only Rixafy\Blog\BlogFacade in DI, but if you have import scripts or something like that, you want to create new blog instances through \Rixafy\Blog\BlogFactory, so you will have it in one transaction 

# Important

This extension requires implementation Doctrine ORM in Nette Framework - https://github.com/nettrine/orm.
