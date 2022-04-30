<?php

namespace Lesson7;

use Lesson7\Classes\SmartPhone;
use Lesson7\Classes\BluetoothSpeaker;
use Lesson7\Classes\WireSpeaker;

// 利用するインターフェース・クラスの読み込み
require_once dirname(__FILE__) . '/Interfaces/Device.php';
require_once dirname(__FILE__) . '/Interfaces/Bluetooth.php';
require_once dirname(__FILE__) . '/Interfaces/Speaker.php';
require_once dirname(__FILE__) . '/Classes/BuiltinSpeaker.php';
require_once dirname(__FILE__) . '/Classes/BluetoothSpeaker.php';
require_once dirname(__FILE__) . '/Classes/WireSpeaker.php';
require_once dirname(__FILE__) . '/Classes/SmartPhone.php';

echo '---------' . PHP_EOL;

// SmartPhoneクラスのインスタンスを作成
$smartPhoneBlue = new SmartPhone('Blue');
$smartPhoneBlue->playMusic();
echo PHP_EOL;

echo '---------' . PHP_EOL;

// BluetoothSpeakerの接続
$bluetoothSpeaker = new BluetoothSpeaker();
$smartPhoneBlue->connectBluetooth($bluetoothSpeaker);
$smartPhoneBlue->playMusic();
echo PHP_EOL;
$smartPhoneBlue->disconnectBluetooth();
echo PHP_EOL;
$smartPhoneBlue->playMusic();
echo PHP_EOL;

echo '---------' . PHP_EOL;

// WireSpeakerの接続
$wireSpeaker = new WireSpeaker();
$smartPhoneBlue->connectBluetooth($wireSpeaker);
echo PHP_EOL;
$smartPhoneBlue->playMusic();
echo PHP_EOL;

