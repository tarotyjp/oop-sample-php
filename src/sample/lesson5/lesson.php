<?php

namespace Lesson5;

use Lesson5\Classes\Sim;
use Lesson5\Classes\SmartPhone;

// 利用するクラスの読み込み
require_once dirname(__FILE__) . '/Classes/Sim.php';
require_once dirname(__FILE__) . '/Classes/SmartPhone.php';

$sim = new Sim('090-0000-0000');
$phone = new SmartPhone($sim);
// 「電話番号：090-0000-0000」と出力
echo "電話番号：" . $phone->getPhoneNumber() . PHP_EOL;

// インスタンスプロパティを容易に変更できてしまう
$phone->phoneNumber = '090-0000-1111';
// 「電話番号：090-0000-1111」と出力
echo "電話番号：" . $phone->getPhoneNumber() . PHP_EOL;
