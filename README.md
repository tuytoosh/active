# Active class directive for Laravel blade

## Installation
For installation use this command:
```
composer require tuytoosh/active
```
## Publish configuration
A simple configuration file has a config key for **default active class**.
Use
```
php artisan vendor:publish --tag=config --force
```
in order to publish the configuration file. The config key is located in `./config/active.php` file and you can replace the default value with your own. In the configuration you can change default `active` and `inactive` classes. For example you can use tailwind classes to activate or deactivate navbar menu items:
```
<?php

return [
    'class' => 'active',
    'inactive_class' => '',
];
```

## How to use
With this package instead of using:
```
class="@if(Route::currentRouteName() == 'home') active @endif"
```
In blade files you can simply use:
```
class="@active('home')"
```
### Override default active and inactive classes
You can override the default active class by passing second parameter to the directive like this:
```
class="@active('home', 'open', 'closed')"
```

### Use `*` for all routes
- `class="@active('*')"` will be `active` for all routes
- `class="@active('admin.*')"` will be `active` for all routes that starts with `admin.`
- `class="@active('admin.post.*', 'open')"` will be `open` for all routes that starts with `admin.post.`

## Array of routes
You can pass an array of routes as first parameter to the directive like this:
```
class="@active(['admin.dashboard', 'user.dashboard'])"
```
`*` and exact patterns will work as well.

## active() and isActive() helpers
All features are available in active() helper function. for example you can use it in your controller like this:
```
// returns string
$class = active('home');
```
or
```
// returns boolean
if(isActive('home')){

}
```


## Todo
- [x] Add support for * at the end of route name
- [x] Add tests
- [ ] Make it compatible with older versions of Laravel
- [ ] Support for route parameters!
- [x] support for array of route patterns


## License
MIT

## Contributing
Please feel free to fork this project and make pull requests.
Test env is ready to use with orchestra testbench and you just need run:
```
composer install
./vendor/bin/phpunit --debug --colors
```
