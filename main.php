<?php

// ファイル読み込み
require_once('./classes/Human.php'); // 人間クラス
require_once('./classes/Enemy.php'); // 敵 クラス
require_once('./classes/Brave.php'); // 勇者クラス


// インスタンス化
//$tiida = new Human(); // 人間
$goblin = new Enemy(); // 敵

$tiida = new Brave();

// === プロパティの name  名前をセットする
$tiida->name = "トッシー";
$goblin->name = "ゴブリン";

$count = 1;

while ($tiida->hitPoint > 0 && $goblin->hitPoint > 0) {

    print "****** $count ターン目 ******\n";

    // === 出力
    print $tiida->name . ":" . $tiida->hitPoint . "/" . $tiida::MAX_HP . "\n";
    print $goblin->name . ":" . $goblin->hitPoint . "/" . $goblin::MAX_HP . "\n";
    echo "\n";

    // === 攻撃
    $tiida->doAttack($goblin);
    echo "\n";

    $goblin->doAttack($tiida);
    echo "\n";

    $count += 1;
}

print "====== 戦闘終了 ======" . "\n\n";
print $tiida->name . ":" . $tiida->hitPoint . "/" . $tiida::MAX_HP . "\n";
print $goblin->name . ":" . $goblin->hitPoint . "/" . $goblin::MAX_HP . "\n";
