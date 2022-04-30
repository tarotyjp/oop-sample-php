<?php

namespace Lesson6\Classes;

/**
 * SIMを表現するクラス
 */
class Sim
{
    /**
     * プロパティ：電話番号
     * @var string
     */
    private string $phoneNumber;

    /**
     * コンストラクタ
     * 指定された電話番号でインスタンスを作成します
     *
     * @param string $phoneNumber
     */
    public function __construct(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * 電話番号を返却します。
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }
}
