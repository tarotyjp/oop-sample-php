<?php

namespace Lesson7\Interfaces;

/**
 * スマートフォンと接続可能な端末のインターフェース
 */
interface Device
{
    public function getName(): string;
}
