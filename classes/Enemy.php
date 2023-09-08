<?php

// =========== 敵　クラス
class Enemy
{
    const MAX_HP = 50; // 最大 HP 
    private $name;
    private $hitPoint = 50; // 現在のHP 
    private $attackPoint = 5; // 攻撃力

    // ====== コンストラクター
    public function __construct($name, $attackPoint)
    {
        $this->name = $name;
        $this->attackPoint = $attackPoint;
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
    // public function doAttack($human)
    public function doAttack($humans)
    {

        // === 自分自身の ヒットポイント（HP）が 0かどうか判定
        if ($this->getHitPoint() <= 0) {
            return false;
        }

        $humanIndex = rand(0, count($humans) - 1); // indexが 0からなので
        $human = $humans[$humanIndex];


        echo "『" . $this->getName() . "』の攻撃！\n";
        echo "【" . $human->getName() . "】に " . $this->getAttackPoint() . " のダメージ！\n";

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
