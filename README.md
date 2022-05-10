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
in order to publish the configuration file. The config key is located in `./config/active.php` file and you can replace the default value with your own.

## How to use
With this package instead of using:
```
class="@if(Route::currentRouteName() == 'home') active @endif"
```
In blade files you can simply use:
```
class="@active('home')"
```
### Override default active class
You can override the default active class by passing second parameter to the directive like this:
```
class="@active('home', 'open')"
```

### Use `*` for all routes
- `class="@active('*')"` will be `active` for all routes
- `class="@active('admin.*')"` will be `active` for all routes that starts with `admin.`
- `class="@active('admin.post.*', 'open')"` will be `open` for all routes that starts with `admin.post.`

## Todo
- [x] Add support for * at the end of route name
- [x] Add tests
- [ ] Make it compatible with older versions of Laravel
- [ ] Support for route parameters!
- [ ] support for multiple routes `in_array()`


## License
MIT

## Contributing
Please feel free to fork this project and make pull requests.
Test env is ready to use with orchestra testbench and you just need run:
```
composer install
./vendor/bin/phpunit --debug --colors
```
