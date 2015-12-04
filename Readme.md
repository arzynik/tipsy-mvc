## Tipsy MVC

An MVC adapter designed after the rails directory structure.

**This is a work in progress**. Don't use it!

Unfortunaly composer doesnt allow dependency scripts to execute so the installation instructions are required. ref https://getcomposer.org/doc/articles/scripts.md#what-is-a-script-


#### Installation

1. `composer require arzynik/tipsy dev-master && composer require arzynik/tipsy-mvc dev-master`
1. `php vendor/arzynik/tipsy-mvc/install.php`


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

See [Tipsy Documentation](https://github.com/arzynik/tipsy/wiki) for more information.
