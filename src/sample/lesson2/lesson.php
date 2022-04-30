<?php

namespace Lesson2;

use Lesson2\Classes\SmartPhone;

// SmartPhoneクラスの読み込み
require_once dirname(__FILE__) . '/Classes/SmartPhone.php';

echo <<<ECHO
--------------
クラスから静的メソッドを利用します。


ECHO;

echo "メーカー：" . SmartPhone::getMaker() . PHP_EOL;

echo <<<ECHO

--------------
インスタンスを作成してメソッドを利用します。
インスタンスから静的なメソッドを呼び出す方法は２種類ありますので、その点にも注意して模写しましょう。

ECHO;

// SmartPhoneクラスのインスタンスを作成
$smartPhoneBlue = new SmartPhone('Blue');
echo PHP_EOL;

echo "[静的でないメソッド] ボディーカラー：" . $smartPhoneBlue->getBodyColor() . PHP_EOL;
echo "[静的なメソッド 呼び出し１] メーカー：" . $smartPhoneBlue->getMaker() . PHP_EOL;
echo "[静的なメソッド 呼び出し２] メーカー：" . $smartPhoneBlue::getMaker() . PHP_EOL;

echo <<<ECHO

--------------
静的なメソッドから静的でないプロパティを利用しているメソッドを呼び出します。
この呼び出しはエラーになります。


ECHO;

echo "[静的でないメソッド] ボディーカラー：" . SmartPhone::getStaticBodyColor() . PHP_EOL;
