<?php

namespace Lesson8;

echo <<<'ECHO'

------------
▼ OOPによる参照渡し

下記手順で実装
1. クラスを定義
　・SIM / iPhone / Android
2. 同一SIMインスタンスを利用して iPhone / Androidのインスタンスを生成
3. SIMの番号を変更する前に iPhone / Android の電話番号を出力して確認
4. SIMの電話番号を変更して iPhone / Android の電話番号を出力して確認
　⇒電話番号の更新には関数を利用
------------

ECHO;

$sim = new Sim('090-0000-0000');
$android = new Android($sim);
$iphone = new iPhone($sim);

echo '>>>> SIMの番号を変更する前に iPhone / Android の電話番号を出力して確認' . PHP_EOL;
echo "\$Android: {$android->sim->phoneNumber}\n";
echo "\$iPhone: {$iphone->sim->phoneNumber}\n";

echo PHP_EOL;

echo '>>>> SIMの電話番号を変更して iPhone / Android の電話番号を出力して確認' . PHP_EOL;
updateSim($sim);
echo "\$Android: {$android->sim->phoneNumber}\n";
echo "\$iPhone: {$iphone->sim->phoneNumber}\n";

class Sim
{
    /**
     * 便宜上引数をpublicで定義
     * @param string $phoneNumber
     */
    public function __construct(public string $phoneNumber)
    {
    }
}

class Android
{
    /**
     * 便宜上引数をpublicで定義
     * @param Sim $sim
     */
    public function __construct(public Sim $sim)
    {
    }
}

class iPhone
{
    /**
     * 便宜上引数をpublicで定義
     * @param Sim $sim
     */
    public function __construct(public Sim $sim)
    {
    }
}

function updateSim(Sim $sim): void
{
    $sim->phoneNumber = '090-1111-1111';
}
