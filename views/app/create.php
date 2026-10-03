<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\App $model */

$this->title = 'Новая заявка';
$this->params['breadcrumbs'][] = ['label' => 'Apps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
