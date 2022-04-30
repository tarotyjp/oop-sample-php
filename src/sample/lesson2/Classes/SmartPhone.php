<?php

namespace Lesson2\Classes;

/**
 * スマートフォンを表現するクラス
 */
class SmartPhone
{
    /**
     * 静的ではないプロパティ：ボディカラー
     * @var string
     */
    private string $bodyColor;

    /**
     * 静的プロパティ：メーカー
     * @var string
     */
    private static string $maker = "SABURO";

    /**
     * コンストラクタ
     * インスタンスを初期化するためメソッド。
     *
     * new SmartPhone("blue");
     * 等とすると実行される。
     *
     * @param string $bodyColor
     */
    public function __construct(string $bodyColor)
    {
        $this->bodyColor = $bodyColor;
        echo "スマートフォンがボディカラー[{$this->bodyColor}]で生成されました" . PHP_EOL;
    }

    /**
     * 静的ではないメソッド
     * 設定されたボディカラーを取得する
     *
     * @return string
     */
    public function getBodyColor(): string
    {
        return $this->bodyColor;
    }

    /**
     * 静的なメソッド
     * メーカーを取得する
     *
     * @return string
     */
    public static function getMaker(): string
    {
        return self::$maker;
    }

    /**
     * 静的なメソッド
     * このメソッドは静的でないプロパティにアクセスしようとしているためエラーとなります
     *
     * @return string
     */
    public static function getStaticBodyColor(): string
    {
        return self::$bodyColor;
    }
}
