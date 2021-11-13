<?php

require_once('./classes/Human.php');
require_once('./classes/Enemy.php');

// インスタンス化
$tiida = new Human();
$goblin = new Enemy();

$tiida->name = "ティーダ";
$goblin->name = "ゴブリン";

while ($tiida->hitPoint > 0 && $goblin->hitPoint > 0) {
  echo $tiida->name . " : " .$tiida->hitPoint . "/" .$tiida::MAX_HITPOINT . "\n";
  echo $goblin->name . " : " .$goblin->hitPoint . "/" .$goblin::MAX_HITPOINT . "\n";
  echo "\n";

  $tiida->doAttack($goblin);
  echo "\n";
  $goblin->doAttack($tiida);
  echo "\n";
}

echo "★★★ 戦闘終了 ★★★\n\n";
echo $tiida->name . " : " .$tiida->hitPoint . "/" .$tiida::MAX_HITPOINT . "\n";
echo $goblin->name . " : " .$goblin->hitPoint . "/" .$goblin::MAX_HITPOINT . "\n\n";