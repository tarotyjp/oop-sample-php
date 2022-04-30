<?php

namespace Lesson7\Classes;

use Lesson7\Interfaces\Bluetooth;
use Lesson7\Interfaces\Speaker;

/**
 * スマートフォンを表現するクラス
 */
class SmartPhone
{
    /**
     * プロパティ：ボディカラー
     * @var string|null
     */
    private ?string $bodyColor = null;

    /**
     * プロパティ：スピーカー
     * @var Speaker|null
     */
    private ?Speaker $speaker = null;

    /**
     * プロパティ：スピーカー
     * @var Speaker|null
     */
    private ?Speaker $builtinSpeaker = null;

    /**
     * コンストラクタ
     * インスタンスを初期化するためメソッド。
     * new SmartPhone("blue");
     * 等とすると実行される。
     *
     * @param $bodyColor
     */
    public function __construct($bodyColor)
    {
        $this->builtinSpeaker = new BuiltinSpeaker();
        $this->speaker = $this->builtinSpeaker;

        $this->bodyColor = $bodyColor;
        echo "スマートフォンがボディカラー[{$this->bodyColor}]で生成されました" . PHP_EOL;
    }

    /**
     * 指定された電話番号を呼び出すためのメソッド
     * ハイフンを含む可能性もあるため文字列で定義しています。
     *
     * @param string $phoneNumber
     * @return void
     */
    public function call(string $phoneNumber): void
    {
        echo "{$phoneNumber}を呼び出しています" . PHP_EOL;
    }

    /**
     * 設定されたボディカラーを取得するためのメソッド
     *
     * @return string
     */
    public function getBodyColor(): string
    {
        return $this->bodyColor;
    }

    /**
     * Bluetooth接続時に実行される
     * @param Bluetooth $device
     * @return void
     */
    public function connectBluetooth(Bluetooth $device): void
    {
        $device->connect();
        echo "{$device->getName()}が接続されました" . PHP_EOL;

        if ($device instanceof Speaker) {
            $this->speaker = $device;
        }
    }

    /**
     * Bluetooth切断時に実行される
     * @return void
     */
    public function disconnectBluetooth(): void
    {
        if (!($this->speaker instanceof Bluetooth)) {
            return;
        }
        $this->speaker->disconnect();
        echo "{$this->speaker->getName()}が切断されました" . PHP_EOL;
        echo "内蔵スピーカーに切り替えます" . PHP_EOL;
        $this->speaker = $this->builtinSpeaker;
    }

    /**
     * 音楽を再生する
     * @return void
     */
    public function playMusic()
    {
        $this->speaker->outputSound();
    }
}
