<?php

class WhiteMage extends Human
{
    const MAX_HP = 80;
    private $hitPoint = 80;
    private $attackPoint = 2;
    private $intelligence = 8; // 魔法攻撃力

    // === コンストラクタ
    public function __construct($name)
    {
        parent::__construct($name, $this->hitPoint, $this->attackPoint);
    }


    // === 回復
    // public function doAttackWhiteMage($enemy, $human)
    public function doAttackWhiteMage($enemies, $humans)
    {

        // ヒットポイント　が 0かどうかチェック
        if ($this->getHitPoint() <= 0) {
            return false;
        }

        $humanIndex = rand(0, count($humans) - 1); // index が 0から始まるので
        $human = $humans[$humanIndex];

        if (rand(1, 2) == 1) {
            print "『" . $this->getName() . "』のスキルが発動した！\n";
            print "ケアル』！！\n";
            print $human->getName() . "のHPを" . $this->intelligence * 1.5 . " 回復！\n";

            $human->recoveryDamage($this->intelligence * 1.5, $human);
        } else {

            // Human クラスの doAttack メソッドの呼び出し
            // parent::doAttack($enemy);
            parent::doAttack($enemies);
        }

        return true;
    }
}
