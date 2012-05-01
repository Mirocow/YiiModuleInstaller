<ul class="nav nav-tabs">
	<li class="<?php echo $home ?>">
		<?php echo CHtml::link('Модули', Yii::app()->baseUrl) ?>
	</li>
	<li class="<?php echo $install ?>">
		<?php echo CHtml::link('Установка', Yii::app()->baseUrl.'/install/index') ?>
	</li>
	<!--li class="<?php echo $build ?>">
		<?php echo CHtml::link('Build', Yii::app()->baseUrl.'/install/build') ?>
	</li-->
</ul>