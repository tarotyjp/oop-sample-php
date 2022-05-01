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
    public Sim $sim;

    /**
     * コンストラクタ
     * インスタンスを作成するためにはSIMのインスタンスが必要
     *
     * @param Sim $sim
     */
    public function __construct(Sim $sim)
    {
        $this->setSim($sim);
    }

    /**
     * SIMを変更するためのメソッド
     *
     * @param Sim $sim
     * @return void
     */
    public function setSim(Sim $sim): void
    {
        $this->sim = $sim;
    }

    /**
     * 電話番号を返却します。
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->sim->getPhoneNumber();
    }
}
