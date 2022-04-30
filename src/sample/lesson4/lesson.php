<?php

namespace Lesson4;

use Lesson4\Classes\SmartPhone;
use Lesson4\Classes\Android;
use Lesson4\Classes\iPhone;

// 利用するクラスの読み込み
require_once dirname(__FILE__) . '/Classes/SmartPhone.php';
require_once dirname(__FILE__) . '/Classes/Android.php';
require_once dirname(__FILE__) . '/Classes/iPhone.php';

echo <<<ECHO

------------
Androidのインスタンスを作成して下記を実行します。
・OSを取得して出力
・他の電話番号を呼び出す


ECHO;
$android = new Android();
echo "AndroidのOS：{$android->getOs()}\n";
$android->call('090-0000-1111');

echo <<<ECHO

--------------
iPhoneのインスタンスを作成して下記を実行します。
・OSを取得して出力
・他の電話番号を呼び出す


ECHO;
$iphone = new iPhone();
echo "iPhoneのOS：{$iphone->getOs()}\n";
$iphone->call('090-0000-1111');

echo <<<ECHO

--------------
SmartPhoneのインスタンスの作成を試行しますが、抽象クラスなのでエラーになります。


ECHO;
$smartPhone = new SmartPhone();
