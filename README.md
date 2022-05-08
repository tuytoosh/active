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

## Todo
- [ ] Add support for regex patterns
- [ ] Add tests
- [ ] Make it work with other version of Laravel
- [ ] Support for route parameters!
- [ ] support for multiple routes `in_array()`


## License
MIT

## Contributing
Please feel free to fork this project and make pull requests.
