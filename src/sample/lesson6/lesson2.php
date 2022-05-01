<?php

namespace Lesson6;

use Lesson6\Classes\Sim;
use Lesson6\Classes\SmartPhone;

// 利用するクラスの読み込み
require_once dirname(__FILE__) . '/Classes/Sim.php';
require_once dirname(__FILE__) . '/Classes/SmartPhone.php';

echo '>>>> SIM / SmartPhone のインスタンスを作成して電話番号を取得します' . PHP_EOL;
$firstSim = new Sim('090-0000-0000');
$phone = new SmartPhone($firstSim);
// 「電話番号：090-0000-0000」と出力
echo "電話番号：" . $phone->getPhoneNumber() . PHP_EOL;

echo PHP_EOL;

echo '>>>> SIMの変更により電話番号を直接変更します' . PHP_EOL;
// SIMを差し替えることで電話番号も変更されます
$secondSim = new Sim('090-0000-1111');
$phone->setSim($secondSim);
// 「電話番号：090-0000-1111」と出力
echo "電話番号：" . $phone->getPhoneNumber() . PHP_EOL;
