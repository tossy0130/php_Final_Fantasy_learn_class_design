<?php

class BlackMage extends Human
{

    // プロパティ
    const MAX_HP = 80;
    private $hitPoint = 80;
    private $attackPoint = 2;
    private $intelligence = 8; // 魔法攻撃力


    // === コンストラクタ
    public function __construct($name)
    {
        parent::__construct($name, $this->hitPoint, $this->attackPoint);
    }


    // === 攻撃メソッド

    // public function doAttack($enemy)
    public function doAttack($enemies)
    {

        // === 自分の ヒットポイントチェック（HP）
        if ($this->getHitPoint() <= 0) {
            return false;
        }

        $enemyIndex = rand(0, count($enemies) - 1); // index は 0から始まるので
        $enemy = $enemies[$enemyIndex];

        if (rand(1, 2) == 1) {
            print "『" . $this->getName() . "』のスキルが発動した！\n";
            print "『ファイア』！！\n";
            print $enemy->getName() . "に" . $this->intelligence * 1.5 . " のダメージ！\n";
            $enemy->tookDamage($this->intelligence * 1.5);
        } else {

            // === 親クラス(Human) classの doAttack メソッド
            // parent::doAttack($enemy);
            parent::doAttack($enemies); // 配列を渡す
        }

        return true;
    }
}
