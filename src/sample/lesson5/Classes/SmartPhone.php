<?php

namespace Lesson5\Classes;

/**
 * スマートフォンを表現するクラス
 */
class SmartPhone
{
    /**
     * プロパティ：Simクラスのインスタンス
     * @var Sim
     */
    private Sim $sim;

    /**
     * プロパティ：電話番号
     * @var string
     */
    public string $phoneNumber;

    /**
     * コンストラクタ
     * インスタンスを作成するためにはSIMのインスタンスが必要
     *
     * @param Sim $sim
     */
    public function __construct(Sim $sim)
    {
        $this->changeSim($sim);
    }

    /**
     * SIMを変更するためのメソッド
     *
     * @param Sim $sim
     * @return void
     */
    public function changeSim(Sim $sim): void
    {
        $this->sim = $sim;
        $this->phoneNumber = $sim->getPhoneNumber();
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
