<?php

// === 勇者　クラス  Human クラスを継承
class Brave extends Human
{

    // プロパティ　上書き
    const MAX_HP = 120;
    private $hitPoint = self::MAX_HP;
    private $attackPoint = 5;

    // ====== コンストラクター
    public function __construct($name)
    {
        // === Human クラスの　プロパティを上書き
        parent::__construct($name, $this->hitPoint, $this->attackPoint);
    }


    // === 攻撃メソッド
    //  public function doAttack($enemy)
    public function doAttack($enemies)
    {
        // === 自分のヒットポイント HP が 0かどうか チェック
        if ($this->getHitPoint() <= 0) {
            return false;
        }


        $enemyIndex = rand(0, count($enemies) - 1); // index は 0から始まる
        $enemy = $enemies[$enemyIndex];


        // 乱数発生
        if (rand(1, 3) === 1) {

            // スキル発動

            /*
            echo "『" . $this->name . "』のスキルが発動した！\n";
            echo "『 *** スーパー Tossy パンチ *** 』！！\n";
            echo $enemy->name . "に" . $this->attackPoint * 1.5 . " のダメージ！\n";
            $enemy->tookDamage($this->attackPoint * 1.5);
            */

            echo "『" . $this->getName() . "』のスキルが発動した！\n";
            echo "『 *** スーパー Tossy パンチ *** 』！！\n";
            echo $enemy->getName() . "に" . $this->getAttackPoint() * 1.5 . " のダメージ！\n";
            $enemy->tookDamage($this->getAttackPoint() * 1.5);
        } else {
            // parent::doAttack($enemy); // === 親クラスの doAttack を使う
            parent::doAttack($enemies);
        }

        return true;
    }
}
