<?php

namespace Lesson7\Interfaces;

/**
 * Bluetooth接続をするためのインターフェース
 */
interface Bluetooth extends Device
{
    public function connect(): void;

    public function disconnect(): void;
}
