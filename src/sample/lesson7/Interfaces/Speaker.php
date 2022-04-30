<?php

namespace Lesson7\Interfaces;

/**
 * スピーカーインターフェース
 */
interface Speaker extends Device
{
    public function outputSound(): void;
}
