<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
Hello <?= $user->username ?>,

Se pare ca ti-ai uitat parola, acceseaza linkul de mai jos pentru resetare:

<?= $resetLink ?>
