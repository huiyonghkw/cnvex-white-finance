# The [e.cnvex.cn](http://bxapi.cnvex.cn/apiService/intoSchemeService.html) White Finance API PHP SDK


## 简介
维配白条PHP SDK，使用维配APP购买配件支持维配白条支付。

扩展包依赖
+ PHP 5.6+ || PHP 7.0+
+ guzzlehttp/guzzle
+ phpunit/phpunit


## 安装 Cnvex.cn PHP SDK

### 使用[composer](https://getcomposer.org/)
> composer 是php的包管理工具， 通过composer.json里的配置管理依赖的包，同时可以在使用类时自动加载对应的包, 在你的composer.json中添加如下依赖

执行
```
composer require bravist/cnvex-white-finance
```

使用 Composer 的 autoload 引入
```php
require_once('vendor/autoload.php');
```

### 手动引入
``` php
require_once('/path/to/cnvex-white-finance/api.php');
```


## For Laravel

Add the following line to the section `providers` of `config/app.php`:

```php
'providers' => [
    //...
    Bravist\CnvexWhiteFinance\ServiceProvider::class,
],
```

publish the configuration:
```
php artisan vendor:publish --provider="Bravist\CnvexWhiteFinance\ServiceProvider"
```

as optional, you can use facade:

```php
'aliases' => [
    'CnvexWhiteFinance' => Bravist\CnvexWhiteFinance\Facade\CnvexWhiteFinance::class
],
```

support package auto discover on laravel 5.5.


## For Lumen

Add the following line to `bootstrap/app.php` after `// $app->withEloquent();`

```php
...
// $app->withEloquent();
$app->register(Bravist\CnvexWhiteFinance\ServiceProvider::class);
...
```

## Usage

```php

>>> CnvexWhiteFinance::supportWhiteFinance('5131261983082700301')
=> {#1239
     +"result": true,
     +"errorCode": 0,
     +"errorMessage": "success",
     +"data": {#1237
       +"creditAccountNumber": "5131261983082700301",
       +"idCardType": "身份证",
       +"idCardNumber": "5131261983082700301",
       +"effectiveDate": 1479710296558,
       +"expiredDate": 1605940696558,
       +"creditLimitAmount": 10000,
       +"frozenAmount": 0,
       +"availableAmount": 9400,
       +"usedAmount": 300,
       +"overdue": true,
       +"lastRepayDate": 1511159896558,
       +"lastRepayAmount": 0,
       +"overdueInterestAmount": 0,
       +"loanAccountCount": 0,
       +"acLoanAccountCount": 0,
       +"overdueLoanAccountCount": 0,
       +"overLoanAccountCount": 0,
       +"createDate": 1479710296558,
       +"lastUpdateDate": 1479710296558,
     },
   }

```

more see phpunit from tests directory.