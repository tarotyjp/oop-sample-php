<?php

namespace Lesson3\Classes;

/**
 * 携帯電話（ガラケー）を表現するクラス
 */
class PortablePhone extends Phone
{
    /**
     * インターネットを利用する
     *
     * @param string $url
     * @return void
     */
    public function useInternet(string $url): void
    {
        echo static::class . 'から' .  __FUNCTION__ . 'メソッドを実行しています。' . PHP_EOL;
        echo "{$url}にアクセスします" . PHP_EOL;
    }

    /**
     * インターネットを利用する
     *
     * @return void
     */
    public function useCamera(): void
    {
        echo static::class . 'から' .  __FUNCTION__ . 'メソッドを実行しています。' . PHP_EOL;
        echo "写真を撮って保存しました" . PHP_EOL;
    }
}
