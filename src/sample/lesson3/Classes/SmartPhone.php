<?php

namespace Lesson3\Classes;

/**
 * スマートフォンを表現するクラス
 */
class SmartPhone extends PortablePhone
{
    /**
     * プロパティ：インストールされたアプリを保持する配列
     * @var array<string, string>
     */
    private array $apps = [];

    /**
     * ガラケーのインターネットを利用する機能を拡張しています
     *
     * @param string $url
     * @return void
     */
    public function useInternet(string $url): void
    {
        echo static::class . 'から' .  __FUNCTION__ . 'メソッドを実行しています。' . PHP_EOL;
        echo PortablePhone::class . 'の' .  __FUNCTION__ . 'メソッドを拡張して再定義しています。' . PHP_EOL;
        echo "{$url}にアクセスします" . PHP_EOL;
    }

    /**
     * アプリコードを基にアプリケーションをインストールします
     *
     * @param string $appCode
     * @return void
     */
    public function installApp(string $appCode): void
    {
        echo "{$appCode}をインストールします" . PHP_EOL;
        $this->apps[$appCode] = "スマホアプリ：{$appCode}";
    }

    /**
     * 指定されたアプリコードでアプリケーションを利用します
     *
     * @param string $appCode
     * @return void
     */
    public function useApp(string $appCode): void
    {
        if (!isset($this->apps[$appCode])) {
            echo "×：{$appCode}はインストールされていません。" . PHP_EOL;
            return;
        }
        echo "〇：{$this->apps[$appCode]}を利用します" . PHP_EOL;
    }

    /**
     * 指定されたアプリコードの対象をアンインストールします。
     *
     * @param string $appCode
     * @return void
     */
    public function uninstallApp(string $appCode): void
    {
        echo "{$appCode}をアンインストールします" . PHP_EOL;
        unset($this->apps[$appCode]);
    }

    /**
     * インストール済みのアプリケーション一覧を取得します。
     *
     * @return array
     */
    public function getInstalledApps(): array
    {
        return $this->apps;
    }
}
