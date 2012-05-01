<?php $this->widget('application.widgets.menu.MenuWidget', array(
	'active' => 'install' 
)) ?>
<?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data', 'class' => 'form-horizontal')); ?>
	<fieldset>
	    <legend>Загрузка модуля</legend>
	    <div class="control-group">
		    <label class="control-label" for="archive">Архив с модулем</label>
		    <div class="controls">
				<?php echo CHtml::activeFileField($form, 'archive'); ?>
				<p class="help-block">Файлы с расширением .zip</p>
			</div>
	    </div>
	    <div class="form-actions">
			<button type="submit" class="btn btn-primary">Установить</button>
			<!--button class="btn">Cancel</button-->
		</div>
	</fieldset>
</form>     