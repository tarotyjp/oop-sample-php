<?php

namespace Lesson7\Classes;

use Lesson7\Interfaces\Speaker;

/**
 * イヤホンジャックを利用するスピーカー
 */
class WireSpeaker implements Speaker
{
    /**
     * プロパティ：デバイスの名前
     * @var string
     */
    private string $name = "WireSpeaker（有線スピーカー）";

    /**
     * デバイス名を返却
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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
