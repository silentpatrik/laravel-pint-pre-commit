# Laravel Pint pre-commit hook

**Laravel Pint pre-commit hook** allow you to analyse your code with the awesome Laravel Pint.

## Features

- Check only staged files
- Pint analysis is disabled during merge phase
- Read the ```./pint.json``` configuration
- Ability to disable Pint verification with -n or -no-verify argument

## Install

```
composer require amphibee/laravel-pint-pre-commit --dev
```

## Options

- ```-n``` or ```-no-verify``` to disable the Pint analysis

## Credits

* [laravel/pint](https://github.com/laravel/pint)
* [Pilipo/composer.json](https://gist.github.com/Pilipo/e52ff5ac38fba9e1f5ed966816de41e9)
* [qiaweicom/laravel-phpcs-pre-commit](https://github.com/qiaweicom/laravel-phpcs-pre-commit)
## License

MIT
