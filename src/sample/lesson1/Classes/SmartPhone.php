<?php

namespace Lesson1\Classes;

/**
 * スマートフォンを表現するクラス
 */
class SmartPhone
{
    /**
     * プロパティ：ボディカラー
     * @var string
     */
    private string $bodyColor;

    /**
     * コンストラクタ
     * インスタンスを初期化するためメソッド。
     *
     * new SmartPhone("blue");
     * とすると実行される。
     *
     * @param string $bodyColor
     */
    public function __construct(string $bodyColor)
    {
        $this->bodyColor = $bodyColor;
        echo "スマートフォンがボディカラー[{$this->bodyColor}]で生成されました" . PHP_EOL;
    }

    /**
     * メソッド
     * 指定された電話番号を呼び出す
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
     * メソッド
     * 設定されたボディカラーを取得
     *
     * @return string
     */
    public function getBodyColor(): string
    {
        return $this->bodyColor;
    }
}
