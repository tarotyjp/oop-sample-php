# カプセル化(情報の隠蔽)

プロパティの読み込み・書き込みやメソッドの呼び出しを制御する仕組みのことを「カプセル化」と呼びます。

スマートフォンの電話番号を想像してみてください。  
一度設定された電話番号はSIMを変更することでしか、変更することは出来ませんね。

電話番号を自由に変更出来てしまうと大きなトラブルになることは想像できると思います。

スマートフォンにおける電話番号の変更をPHPのソースで表現した場合、どのように実装すべきかを確認してみましょう。

## 悪い実装

まずはトラブルが発生してしまう。  
下記のように `Sim` クラスと `SmartPhone` クラスがあったとします。

```PHP
<?php

/**
 * SIMを表現するクラス
 */
class Sim
{
    /**
     * プロパティ：電話番号
     * @var string
     */
    private string $phoneNumber;

    /**
     * コンストラクタ
     * 指定された電話番号でインスタンスを作成します
     *
     * @param string $phoneNumber
     */
    public function __construct(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * 電話番号を返却します。
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }
}

/**
 * スマートフォンを表現するクラス
 */
class SmartPhone
{
    /**
     * プロパティ：Simクラスのインスタンス
     * @var Sim
     */
    private Sim $sim;

    /**
     * プロパティ：電話番号
     * @var string
     */
    public string $phoneNumber;

    /**
     * コンストラクタ
     * インスタンスを作成するためにはSIMのインスタンスが必要
     *
     * @param Sim $sim
     */
    public function __construct(Sim $sim)
    {
        $this->changeSim($sim);
    }

    /**
     * SIMを変更するためのメソッド
     *
     * @param Sim $sim
     * @return void
     */
    public function changeSim(Sim $sim): void
    {
        $this->sim = $sim;
        $this->phoneNumber = $sim->getPhoneNumber();
    }

    /**
     * 電話番号を返却します。
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }
}
```

しかし、この実装には大きな問題があります。  
先ほどのクラスを利用した処理を書いてみます。

```PHP
<?php
$sim = new Sim('090-0000-0000');
$phone = new SmartPhone($sim);
// 「電話番号：090-0000-0000」と出力
echo "電話番号：" . $phone->getPhoneNumber() . PHP_EOL;

// インスタンスプロパティを容易に変更できてしまう
$phone->phoneNumber = '090-0000-1111';
// 「電話番号：090-0000-1111」と出力
echo "電話番号：" . $phone->getPhoneNumber() . PHP_EOL;
```

ソース中にコメントもしていますが、先ほどのクラス定義では一度作成されたインスタンスプロパティを外部から容易に変更できてしまいます。  
これでは、ちょっとした実装ミスで大きなトラブルになりかねません。

こちらで紹介したソースは下記で動作を確認できます。  
時間があれば模写してから実行してみましょう。

- サンプルソース: [src/sample/lesson5](sample/lesson5)
- 保存先： [src/learning/lesson5](learning/lesson5)

実行方法は下記のとおりです。  
＊ `docker compose up -d` を実行していない場合は先に実行してください

```bash
docker composer exec php php ./lesson5/lesson.php
```

正しく模写されていれば下記のように出力されます。

```text
電話番号：090-0000-0000
電話番号：090-0000-1111
```

## 良い実装

「悪い実装」で発生するようなトラブルを未然に防ぐために、OOPには「アクセス権」と呼ばれる修飾子を設定することができます。

では、先ほどのSmartPhoneクラスを適切な形に実装し直してみましょう

```PHP
<?php

namespace Lesson6\Classes;

/**
 * スマートフォンを表現するクラス
 */
class SmartPhone
{
    /**
     * プロパティ：Simクラスのインスタンス
     * @var Sim
     */
    private Sim $sim;

    /**
     * プロパティ：電話番号
     * @var string
     */
    private string $phoneNumber;

    /**
     * コンストラクタ
     * インスタンスを作成するためにはSIMのインスタンスが必要
     *
     * @param Sim $sim
     */
    public function __construct(Sim $sim)
    {
        $this->changeSim($sim);
    }

    /**
     * SIMを変更するためのメソッド
     *
     * @param Sim $sim
     * @return void
     */
    public function changeSim(Sim $sim): void
    {
        $this->sim = $sim;
        $this->phoneNumber = $sim->getPhoneNumber();
    }

    /**
     * 電話番号を返却します。
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }
}
```

変更箇所は１か所のみで、インスタンスプロパティ `$phoneNumber` の行頭にあった `public` を `private` に変更しました。

```PHP
<?php
$sim = new Sim('090-0000-0000');
$phone = new SmartPhone($sim);
// 「電話番号：090-0000-0000」と出力
echo "電話番号：" . $phone->getPhoneNumber() . PHP_EOL;

// 外部に公開されていないため、直接変更することができずエラーとなる
$phone->phoneNumber = '090-0000-1111';
// エラーのため下記ステートメントには到達出来ません
echo "電話番号：" . $phone->getPhoneNumber() . PHP_EOL;
```

ソース中にもコメントしてますが、インスタンスの外部から電話番号を直接変更しようとするとエラーとなります。  
このようにすることで、SIMを差し替える事でのみスマートフォンの電話番号の変更が可能となります。

では、SIMのの変更による電話番号の変更を確認してみましょう。

```PHP
<?php
$firstSim = new Sim('090-0000-0000');
$phone = new SmartPhone($firstSim);
// 「電話番号：090-0000-0000」と出力
echo "電話番号：" . $phone->getPhoneNumber() . PHP_EOL;

// SIMを差し替えることで電話番号も変更されます
$secondSim = new Sim('090-0000-1111');
$phone->changeSim($secondSim);
// 「電話番号：090-0000-1111」と出力
echo "電話番号：" . $phone->getPhoneNumber() . PHP_EOL;
```

このように、カプセル化とは適切なアクセス権で定義することで、ちょっとした実装ミスによる大きなトラブルを未然に防ぐ効果があるのです。

こちらで紹介したソースは下記で動作を確認できます。  
時間があれば模写してから実行してみましょう。

- サンプルソース: [src/sample/lesson6](sample/lesson6)
- 保存先： [src/learning/lesson6](learning/lesson6)

実行はエラーが発生するパターンと正常に終了するパターンで分けておりそれぞれ下記のとおりです。  
＊ `docker compose up -d` を実行していない場合は先に実行してください

エラーが発生するパターン

```bash
docker composer exec php php ./lesson6/lesson1.php
```

正しく模写されていれば下記のように出力されます。

```text
電話番号：090-0000-0000
PHP Fatal error:  Uncaught Error: Cannot access private property Lesson6\Classes\SmartPhone::$phoneNumber in /var/www/sample/lesson6/lesson1.php:18
Stack trace:
#0 {main}
  thrown in /var/www/sample/lesson6/lesson1.php on line 18

Fatal error: Uncaught Error: Cannot access private property Lesson6\Classes\SmartPhone::$phoneNumber in /var/www/sample/lesson6/lesson1.php on line 18

Error: Cannot access private property Lesson6\Classes\SmartPhone::$phoneNumber in /var/www/sample/lesson6/lesson1.php on line 18

Call Stack:
    0.0026     391616   1. {main}() /var/www/sample/lesson6/lesson1.php:0
```

正常に実行できるパターン

```bash
docker composer exec php php ./lesson6/lesson2.php
```

正しく模写されていれば下記のように出力されます。

```text
電話番号：090-0000-0000
電話番号：090-0000-1111
```

## PHPで利用できるアクセス権

PHPで定義できるアクセス権には下記３通りあります。

| アクセス権     | 説明                           |
|-----------|------------------------------|
| public    | 外部からアクセスできる                  |
| protected | 定義されたクラスと継承関係にあるクラス間でアクセスできる |
| private   | 定義されたクラス内でしかアクセスできない         |

なお、アクセス権を省略すると、`public` で宣言しているのと同義になります。  
しかし、外部に公開する場合でも省略することは推奨されていないため、必ず明示することを心がけましょう。

## 適切なアクセス権

これまでの実装例などで、アクセス権にはいくつかあることが分かりました。

では、利用するアクセス権はどのように決めればよいでしょうか？  
基本的な考え方として、下記のように考えるとよいです。

|       | 説明                                                                                                                             |
|-------|--------------------------------------------------------------------------------------------------------------------------------|
| プロパティ | 基本的に `private` を利用します。<br>継承関係にあるクラスや外部からアクセスできるようにしたい時にはメソッドを通してアクセスします。<br>`private` 以外を利用したくなっても直接アクセスさせる明確な理由がない限りは利用しません。 |
| メソッド  | `private` を優先して利用します。<br>必要に応じて `protected` 、 `public` の順に徐々に公開範囲を広げます。                                                        |

これらは基本的な考え方であり、プロジェクトや利用するフレームワークによっては事情が異なることがあります。

なお、公開されていないプロパティの参照を目的にしたメソッドのことを「getter（ゲッター）」と呼び、公開されていないプロパティの更新を目的にしたメソッドのことを「setter（セッター）」と呼びます。 そして、getter /
setter を総称して「accessor（アクセサ）」と呼びます。

先ほどのメソッドの説明では、「`private` を優先して利用する」と説明しましたが、accessorは基本的には `public` を利用することが多く、外部に公開したくない特別な理由があれば `protected` を利用します。  
（accessorを`private`にするような実装はあまりやりません）

また、PHPを含む多くの言語ではアクセサは下記のような名前で実装されることが多いです。

- getter: メソッド名がgetから始まる
    - 例）`public function getPhoneNumber()`
- setter: メソッド名がsetから始まる
    - 例）`public function setSim(Sim $sim)`
    - ＊今回のサンプルでは `changeSim()` として実装しており厳密にはsetterではありません

＊言語によっては GetXxx() / SetXxxの() ように大文字始まりが推奨されることもあります。
