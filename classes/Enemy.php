<?php

// =========== 敵　クラス
class Enemy
{
    const MAX_HP = 50; // 最大 HP 
    private $name;
    private $hitPoint = 50; // 現在のHP 
    private $attackPoint = 10; // 攻撃力

    // ====== コンストラクター
    public function __construct($name)
    {
        $this->name = $name;
    }


    // === ゲッター name
    public function getName()
    {
        return $this->name;
    }

    // === ゲッター hitPoint
    public function getHitPoint()
    {
        return $this->hitPoint;
    }

    // === ゲッター attackPoint
    public function getAttackPoint()
    {
        return $this->attackPoint;
    }


    // === 攻撃メソッド
    public function doAttack($human)
    {
        echo "『" . $this->name . "』の攻撃！\n";
        echo "【" . $human->name . "】に " . $this->attackPoint . " のダメージ！\n";

        $human->tookDamage($this->attackPoint); // 引数に現在の　HP　を入れる

    }

    // === ダメージを受けるメソッド
    public function tookDamage($damage)
    {
        $this->hitPoint -= $damage;

        if ($this->hitPoint < 0) {
            $this->hitPoint = 0;
        }
    }
}
