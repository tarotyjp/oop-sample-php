<?php

namespace Lesson1;

use Lesson1\Classes\SmartPhone;

echo '---------' . PHP_EOL;

// SmartPhoneクラスの読み込み
require_once dirname(__FILE__) . '/Classes/SmartPhone.php';

// SmartPhoneクラスのインスタンスを作成
$smartPhoneBlue = new SmartPhone('Blue');
echo PHP_EOL;

// インスタンスのcall()メソッドを実行
$smartPhoneBlue->call('090-1234-5678');
echo PHP_EOL;

// インスタンスの getBodyColor() を利用してボディカラーを取得して表示
echo "このスマホのボディーカラーは[{$smartPhoneBlue->getBodyColor()}]です";
echo PHP_EOL;

echo '---------' . PHP_EOL;

// SmartPhoneクラスのインスタンスを作成
$smartPhoneRed = new SmartPhone('Red');
echo PHP_EOL;

// インスタンスのcall()メソッドを実行
$smartPhoneRed->call('090-1234-5678');
echo PHP_EOL;

// インスタンスの getBodyColor() を利用してボディカラーを取得して表示
echo "このスマホのボディーカラーは[{$smartPhoneRed->getBodyColor()}]です";
echo PHP_EOL;
