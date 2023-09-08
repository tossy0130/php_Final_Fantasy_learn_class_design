<?php

// ファイル読み込み
require_once('./classes/Human.php'); // 人間クラス
require_once('./classes/Enemy.php'); // 敵 クラス
require_once('./classes/Brave.php'); // 勇者クラス

require_once('./classes/BlackMage.php'); // 黒魔導士クラス
require_once('./classes/WhiteMage.php'); // 白魔導士クラス


// インスタンス化
//$tiida = new Human(); // 人間

// $tiida = new Brave("トッシー"); // 敵
// $goblin = new Enemy("ゴブリン");

// === 味方
$members = array();
$members[] = new Brave("トッシー");
$members[] = new WhiteMage('白魔導士');
$members[] = new BlackMage('黒魔導士');

// === 敵
$enemies = array();

/*
$enemies[] = new Enemy("ゴブリン");
$enemies[] = new Enemy("モンスター");
$enemies[] = new Enemy("スライム");
*/

// === name と attackPoint の初期値をセット
$enemies[] = new Enemy('ゴブリン', 5);
$enemies[] = new Enemy('ボム', 7);
$enemies[] = new Enemy('モルボル', 12);

// === プロパティの name  名前をセットする
// $tiida->name = "トッシー";
// $goblin->name = "ゴブリン";

$count = 1;

$isFinishFlg = false;  // ループ用フラグ

// while ($tiida->hitPoint > 0 && $goblin->hitPoint > 0) {
// while ($tiida->getHitPoint() > 0 && $goblin->getHitPoint() > 0) {
while (!$isFinishFlg) {

    print "****** $count ターン目 ******\n";


    foreach ($members as $member) {
        echo $member->getName() . ":" . $member->getHitPoint() . "/" . $member::MAX_HP . "\n";
    }

    echo "\n";

    foreach ($enemies as $enemy) {
        echo $enemy->getName() . ":" . $enemy->getHitPoint() . "/" . $enemy::MAX_HP . "\n";
    }

    // ====== 攻撃（味方） => 敵　へ
    foreach ($members as $member) {

        /*
        $enemyIndex = rand(0, count($enemies) - 1); // 0　～から 配列の長さ
        $enemy = $enemies[$enemyIndex]; // 攻撃する敵を抽出
        */

        // === 白魔導士の場合　回復、それ以外は攻撃
        if (get_class($member) == "WhiteMage") {

            $member->doAttackWhiteMage($enemies, $members); // 配列を渡す
            // $member->doAttackWhiteMage($enemy, $member);

        } else {
            // $member->doAttack($enemy);
            $member->doAttack($enemies); // 配列を渡す
        }
        echo "\n";
    }
    echo "\n";


    // ====== 敵 => 攻撃（味方）へ
    foreach ($enemies as $enemy) {

        /*
        $memberIndex = rand(0, count($members) - 1);
        $member = $members[$memberIndex];
        $enemy->doAttack($member);
        */

        $enemy->doAttack($members); // 配列を渡す

        echo "\n";
    }

    // ========= 仲間の全滅チェック
    $deathCnt = 0; // HP が 0 以下の仲間の数
    foreach ($members as $member) {
        if ($member->getHitPoint() > 0) {
            $isFinishFlg = false;
            break;
        }
        $deathCnt += 1;
    }

    if ($deathCnt === count($members)) {
        $isFinishFlg = true;
        print "GAME OVER ... \n\n";
        break;
    }

    // ========= 敵の全滅チェック
    $deathCnt = 0; // HP が 0以下の敵の数
    foreach ($enemies as $enemy) {
        if ($enemy->getHitPoint() > 0) {
            $isFinishFlg = false;
            break;
        }
        $deathCnt += 1;
    }

    if ($deathCnt === count($enemies)) {
        $isFinishFlg = true;
        print "GAME Crear";
        break;
    }

    $count += 1;
}

print "====== 戦闘終了 ======" . "\n\n";
//print $tiida->name . ":" . $tiida->hitPoint . "/" . $tiida::MAX_HP . "\n";
//print $goblin->name . ":" . $goblin->hitPoint . "/" . $goblin::MAX_HP . "\n";

// print $tiida->getName() . ":" . $tiida->getHitPoint() . "/" . $tiida::MAX_HP . "\n";
// print $goblin->getName() . ":" . $goblin->getHitPoint() . "/" . $goblin::MAX_HP . "\n";

foreach ($members as $member) {
    echo $member->getName() . ":" . $member->getHitPoint() . "/" . $member::MAX_HP . "\n";
}

echo "\n";

foreach ($enemies as $enemy) {
    echo $enemy->getName() . ":" . $enemy->getHitPoint() . "/" . $enemy::MAX_HP . "\n";
}
