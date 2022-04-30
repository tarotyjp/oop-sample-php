<?php

namespace Lesson4\Classes;

/**
 * iPhone表現するクラス
 */
class iPhone extends SmartPhone
{
    /**
     * OSを文字情報で返却します
     *
     * @return string
     */
    public function getOs(): string
    {
        return 'iOS';
    }
}
