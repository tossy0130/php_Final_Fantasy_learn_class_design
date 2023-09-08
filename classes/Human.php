<?php

class Human
{

    // プロパティ
    const MAX_HP = 100; // 最大 HP
    private $name; // 人間の名前
    private $hitPoint = 100; // 現在のHP
    private $attackPoint = 3; // 攻撃力


    // === コンストラクター
    public function __construct($name)
    {
        $this->name = $name;
    }


    // === 攻撃メソッド
    // public function doAttack($enemy)
    public function doAttack($enemies)
    {

        // === ヒットポイントチェック HP
        if ($this->getHitPoint() <= 0) {
            return false;
        }

        $enemyIndex = rand(0, count($enemies) - 1); // index は 0からなので
        $enemy = $enemies[$enemyIndex];


        print "『" . $this->getName() . "』の攻撃!\n";
        print "【" . $enemy->getName() . "】に" . $this->attackPoint . "ダメージ!\n";

        $enemy->tookDamage($this->attackPoint); // 引数に現在の　HP　を入れる
    }

    // === ダメージを受けるメソッド
    public function tookDamage($damage)
    {
        $this->hitPoint -= $damage;

        // HP が 0未満にならない処理
        if ($this->hitPoint < 0) {
            $this->hitPoint = 0;
        }
    }

    // === 回復メソッド
    public function recoveryDamage($heal, $target)
    {
        $this->hitPoint += $heal;

        if ($this->hitPoint > $target::MAX_HP) {
            $this->hitPoint = $target::MAX_HP;
        }
    }

    // === アクセサーメソッド get
    public function getName()
    {
        return $this->name;
    }


    // === ヒットポイント get
    public function getHitPoint()
    {
        return $this->hitPoint;
    }

    public function getAttackPoint()
    {
        return $this->attackPoint;
    }
}
