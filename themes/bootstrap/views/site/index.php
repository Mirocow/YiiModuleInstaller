<?php $this->widget('application.widgets.menu.MenuWidget', array(
	'active' => 'home' 
)) ?>
<h1>Список установленных модулей</h1>
<p>Все модули, которые установленны в приложении.<br> Чтобы модуль отображался в этом списке, <br> нужно добавить файл manifest.php в дирректорию самого модуля.</p>
<table class="table table-striped">
	<!--thead>
		<tr>
			<th>Modules</th>
			<th>Actions</th>
		</tr>
  	</thead-->
  	<tbody>
	<?php foreach ($modules as $key => $module):?>
		<tr>
			<td>
				<h3><?php echo $module['title'] ?></h3>
				<p><?php echo $module['description'] ?></p>
			</td>
			<td>
				<?php echo CHtml::link('Упаковать', Yii::app()->baseUrl.'/install/build/'.$key, array('class' => 'btn btn-primary')) ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>