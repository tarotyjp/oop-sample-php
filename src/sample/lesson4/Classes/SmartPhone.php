<?php

namespace Lesson4\Classes;

/**
 * スマートフォンを表現する抽象クラス
 */
abstract class SmartPhone
{
    /**
     * 抽象メソッド
     * OSを文字情報で返却します
     *
     * @return string
     */
    abstract public function getOs(): string;

    /**
     * 指定された電話番号を呼び出す
     *
     * @param string $phoneNumber
     * @return void
     */
    public function call(string $phoneNumber): void
    {
        echo static::class . 'から' .  __FUNCTION__ . 'メソッドを実行しています。' . PHP_EOL;
        echo "{$phoneNumber}を呼び出します。" . PHP_EOL;
    }
}
