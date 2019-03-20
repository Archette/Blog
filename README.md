# Blog
📝 CRUD model rixafy/blog ported to @nette framework.

# Basic usage

Add configuration to your boot file before your main config (propably config.neon).
```PHP
$configurator->addConfig(__DIR__ . '/../vendor/archette/blog/config/config.neon');
```

Then you will have injected all services in DI, advanced blog configuration will be released soon (posts per page configuration, etc)

It's recommended to use only Rixafy\Blog\BlogFacade in DI, but if you have import scripts or something like that, you want to create new blog instances through \Rixafy\Blog\BlogFactory, so you will have it in one transaction 

# Important

This extension requires implementation Doctrine ORM in nette - https://github.com/nettrine/orm and you must have configured annotation as described in https://github.com/nettrine/orm/blob/master/.docs/README.md#minimal-configuration becasue blog will add ORM path to 'orm.annotations' config key.
