<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\App $model */

if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin()) {
    $this->title = 'Сменить статус: заявка ' . $model->id;
} else {
    $this->title = 'Оставить отзыв: заявка ' . $model->id;
}
$this->params['breadcrumbs'][] = ['label' => 'Apps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="app-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
