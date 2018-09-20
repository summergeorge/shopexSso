<h1 align="center"> shopexsso </h1>

<p align="center"> A SDK for Shopex user SSO..</p>


## Installing

```shell
$ composer require shopex/sso -vvv

$ php artisan vendor:publish --provider=Shopex\Sso\ServiceProvider
```
然后在config/shopexss.php 中配置密钥相关信息

## Usage
```php
//use;
use Shopex\Sso\ssoClient;

//使用sdk获取登陆地址
$client = new ssoClient();

//获取登陆地址
$url = $client->getLoginUrl('http://www.baidu.com');

//获取登出地址
$url = $client->getLogoutUrl($token,$redirect_url=null);

//获取用户信息
$user = $client->getUserInfo($code);

echo $url;
```
## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/summergeorge/shopexSso/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/summergeorge/shopexSso/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT