## Tipsy MVC

An MVC adapter designed after the rails directory structure.

Unfortunaly composer doesnt allow dependency scripts to execute so the installation instructions are required. ref https://getcomposer.org/doc/articles/scripts.md#what-is-a-script- . See https://github.com/tipsyphp/tipsy-example-mvc/blob/master/composer.json for an example composer file with auto install.


#### Installation

1. `composer require tipsyphp/tipsy dev-master && composer require tipsyphp/tipsy-mvc dev-master`
1. `php vendor/tipsyphp/tipsy-mvc/install.php`


#### Directory Structure
```
app
  controllers
    home
	  index.php
  models
  view
    home.phtml
	layouts
	  default.phtml
config
  config.ini
public
  .htaccess
  index.php
```

See [Tipsy Documentation](https://github.com/tipsyphp/tipsy/wiki) for more information.
