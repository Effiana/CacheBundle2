# PSR-6 Cache bundle

This is a Symfony bundle that lets you you integrate your PSR-6 compliant cache service with the framework. 
It lets you cache your sessions, routes and Doctrine results and metadata. It also provides an integration with the 
debug toolbar. This bundle does not contain any pool implementation nor does it help you register cache pool services. 
You maybe interested in [AdapterBundle](https://github.com/php-cache/adapter-bundle) which will help you configure and
register PSR-6 cache pools as services. 

This bundle  is a part of the PHP Cache organisation. To read about features like tagging and hierarchy support please 
read the shared documentation at [www.php-cache.com](http://www.php-cache.com).

### To Install

Run the following in your project root, assuming you have composer set up for your project
```sh
composer require cache/cache-bundle
```

Add the bundle to app/AppKernel.php

```php
$bundles(
    // ...
    new Effiana\CacheBundle\CacheBundle(),
    // ...
);
```

Read the documentation at [www.php-cache.com/symfony/cache-bundle](http://www.php-cache.com/en/latest/symfony/cache-bundle/).

### Contribute

Contributions are very welcome! Send a pull request or report any issues you find on the [issue tracker](http://issues.php-cache.com).
