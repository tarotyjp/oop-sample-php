<?php

namespace Lesson3\Classes;

/**
 * 固定電話を表現するクラス
 */
class Phone
{
    /**
     * プロパティ：電話番号
     * @var string
     */
    private string $phoneNumber;

    /**
     * コンストラクタ
     *
     * @param string $phoneNumber
     */
    public function __construct(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

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
