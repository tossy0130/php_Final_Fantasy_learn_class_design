<?php

class Human
{

    // プロパティ
    const MAX_HP = 100; // 最大 HP
    private $name; // 人間の名前
    private $hitPoint = 100; // 現在のHP
    private $attackPoint = 20; // 攻撃力


    // === コンストラクター
    public function __construct($name)
    {
        $this->name = $name;
    }


    // === 攻撃メソッド
    public function doAttack($enemy)
    {
        print "『" . $this->name . "』の攻撃!\n";
        print "【" . $enemy->name . "】に" . $this->attackPoint . "ダメージ!\n";

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
