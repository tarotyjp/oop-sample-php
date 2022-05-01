<?php

namespace Lesson8;

echo <<<'ECHO'

------------
▼ 関数による参照渡し定義の動作確認

下記手順で実装
1. 関数を２種類定義
　⇒updateValue(): 引数を値渡しで定義
　⇒updateReferense(): 引数を参照渡しで定義
1. $name に `saburo` を代入
2. $nickName に $name を参照渡しで代入
3. $nickName を updateValue() を利用して 'さぶろう' に変更
4. $name と $nickName の値を出力して確認
5. $nickName を updateReferense() を利用して 'サブロウ' に変更
6. $name と $nickName の値を出力して確認
------------

ECHO;

$name = 'saburo';
$nickName =& $name;

echo '>>>> updateValue()を利用して更新後値を出力' . PHP_EOL;
updateValue($nickName);
echo "\$name: {$name}\n";
echo "\$nickName: {$nickName}\n";

echo PHP_EOL;

echo '>>>> updateReferense()を利用して更新後値を出力' . PHP_EOL;
updateReferense($nickName);
echo "\$name: {$name}\n";
echo "\$nickName: {$nickName}\n";

function updateValue($nickName): void
{
    $nickName = 'さぶろう';
}

function updateReferense(&$nickName): void
{
    $nickName = 'サブロウ';
}
