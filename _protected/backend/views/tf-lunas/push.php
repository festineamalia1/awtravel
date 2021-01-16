<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
 
$this->title = 'Notifikasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
<h1><?= Html::encode($this->title) ?></h1>
<div class="row">
<div class="col-lg-5">
<form action=" " method="POST">
	<input type="text" name="nama">
	<textarea name="message"></textarea>
	<button type="submit" name="submit">kirim</button>	
</form>
</div>
</div>
</div>
