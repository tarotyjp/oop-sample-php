<?php

namespace Lesson6;

use Lesson6\Classes\Sim;
use Lesson6\Classes\SmartPhone;

// 利用するクラスの読み込み
require_once dirname(__FILE__) . '/Classes/Sim.php';
require_once dirname(__FILE__) . '/Classes/SmartPhone.php';

$sim = new Sim('090-0000-0000');
$phone = new SmartPhone($sim);
// 「電話番号：090-0000-0000」と出力
echo "電話番号：" . $phone->getPhoneNumber() . PHP_EOL;

// 外部に公開されていないため、直接変更することができずエラーとなる
$phone->phoneNumber = '090-0000-1111';
// エラーのため下記ステートメントには到達出来ません
echo "電話番号：" . $phone->getPhoneNumber() . PHP_EOL;
