<?php

namespace Lesson7\Classes;

use Lesson7\Interfaces\Bluetooth;
use Lesson7\Interfaces\Speaker;

/**
 * Bluetoothを利用するスピーカー
 */
class BluetoothSpeaker implements Bluetooth, Speaker
{
    /**
     * プロパティ：デバイスの名前
     * @var string
     */
    private string $name = "BluetoothSpeaker（ブルートゥーススピーカー）";

    /**
     * デバイス名を返却
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Bluetooth接続時に実行される
     * @return void
     */
    public function connect(): void
    {
        echo "{$this->getName()}を接続します" . PHP_EOL;
    }

    /**
     * Bluetooth切断時に実行される
     * @return void
     */
    public function disconnect(): void
    {
        echo "{$this->getName()}を切断します" . PHP_EOL;
    }

    /**
     * スピーカーから音を出す
     * @return void
     */
    public function outputSound(): void
    {
        echo "{$this->getName()}から音を出します" . PHP_EOL;
    }
}
