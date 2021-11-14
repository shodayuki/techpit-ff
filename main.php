<?php

require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');
require_once('./classes/BlackMage.php');
require_once('./classes/WhiteMage.php');
require_once('./classes/Message.php');

// インスタンス化(余裕があるときにHPを作ってみる)
$members = array();
$members[] = new Brave('ティーダ');
$members[] = new WhiteMage('ユウナ');
$members[] = new BlackMage('ルールー');

$enemies = array();
$enemies[] = new Enemy('ゴブリン', 20);
$enemies[] = new Enemy('ボム', 25);
$enemies[] = new Enemy('モルボル', 30);

$turn = 1;
$isFinishFlg = false;
$messageObj = new Message;

// 終了条件の判定
function isFinish($objects)
{
  $deathCnt = 0;
  foreach ($objects as $object) {
    if ($object->getHitPoint() > 0) {
      return false;
    }
    $deathCnt++;
  }

  if ($deathCnt === count($objects)) {
    return true;
  }
}

while (!$isFinishFlg) {
  echo "*** $turn ターン目 ***\n\n";

  // 仲間の表示
  $messageObj->displayStatusMessage($members);

  // 敵の表示
  $messageObj->displayStatusMessage($enemies);

  // 仲間の攻撃
  $messageObj->displayAttackMessage($members, $enemies);

  // 敵の攻撃
  $messageObj->displayAttackMessage($enemies, $members);

  // 戦闘終了条件のチェック 仲間全員のHPが0 または、敵全員のHPが0
  $isFinishFlg = isFinish($members);
  if ($isFinishFlg) {
    $message = "GAME OVER ...\n\n";
    break;
  }

  $isFinishFlg = isFinish($enemies);
  if ($isFinishFlg) {
    $message = "♪♪♪ファンファーレ♪♪♪\n\n";
    break;
  }

  $turn++;
}

echo "★★★ 戦闘終了 ★★★\n\n";

echo $message;

$messageObj->displayStatusMessage($members);
$messageObj->displayStatusMessage($enemies);