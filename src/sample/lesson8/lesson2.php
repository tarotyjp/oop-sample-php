<?php

namespace Lesson8;

echo <<<'ECHO'

------------
▼ 参照渡しの動作確認

下記手順で実装
1. $name に `saburo` を代入
2. $nickName に $name を参照渡しで代入
3. $nickName を 'さぶろう' に変更
　⇒ $name は変更しない
4. $name と $nickName の値を出力して確認
------------

ECHO;

$name = 'saburo';
$nickName =& $name;
$nickName = 'さぶろう';

echo "\$name: {$name}\n";
echo "\$nickName: {$nickName}\n";
