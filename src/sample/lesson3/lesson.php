<?php

namespace Lesson3;

use Lesson3\Classes\Phone;
use Lesson3\Classes\PortablePhone;
use Lesson3\Classes\SmartPhone;

// 利用するクラスの読み込み
require_once dirname(__FILE__) . '/Classes/Phone.php';
require_once dirname(__FILE__) . '/Classes/PortablePhone.php';
require_once dirname(__FILE__) . '/Classes/SmartPhone.php';

echo <<<ECHO

--------------
固定電話を利用します。


ECHO;
$phone = new Phone('090-0000-0000');
$phone->call('090-1111-1111');

echo <<<ECHO

--------------
携帯電話（ガラケー）を利用します。


ECHO;
$portablePhone = new PortablePhone('090-0000-0000');

echo "▼ 親クラス（固定電話）で実装された機能の利用" . PHP_EOL;
$portablePhone->call('090-1111-1111');
echo PHP_EOL;

echo "▼ 携帯電話（ガラケー）で実装された機能の利用" . PHP_EOL;
$portablePhone->useCamera();
$portablePhone->useInternet('https://google.com/');

echo <<<ECHO

--------------
スマートフォンを利用します。


ECHO;
$smartPhone = new SmartPhone('090-0000-0000');

echo "▼ 親クラス（固定電話）で実装された機能の利用" . PHP_EOL;
$portablePhone->call('090-1111-1111');
echo PHP_EOL;

echo "▼ 親クラス（ガラケー）で実装された機能の利用" . PHP_EOL;
$smartPhone->useCamera();
$smartPhone->useInternet('https://google.com/');
echo PHP_EOL;

echo "▼ スマートフォンで実装された機能の利用" . PHP_EOL;
$smartPhone->installApp('APP_CODE_HOGE');
$smartPhone->useApp('APP_CODE_HOGE');
echo PHP_EOL;

$smartPhone->useApp('APP_CODE_FUGA');
$smartPhone->installApp('APP_CODE_FUGA');
$smartPhone->useApp('APP_CODE_FUGA');
echo PHP_EOL;

echo "１回目：インストール済みのアプリケーションは下記のとおりです" . PHP_EOL;
outputInstalledApp($smartPhone);
echo PHP_EOL;

$smartPhone->uninstallApp('APP_CODE_FUGA');
echo "２回目：インストール済みのアプリケーションは下記のとおりです" . PHP_EOL;
outputInstalledApp($smartPhone);

function outputInstalledApp(SmartPhone $smartPhone): void
{
    $apps = $smartPhone->getInstalledApps();
    foreach ($apps as $app) {
        echo "  {$app}" . PHP_EOL;
    }
}
