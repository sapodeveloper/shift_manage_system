<center>
	<h1 class="uk-article-title"> パスワード変更画面 </h1>
		<br>
	<?php echo Form::open(array("action" => "user/change_password")); ?>		<fieldset>
			<i class="fa fa-key"></i> 旧パスワード　<?php echo Form::password('old_password', Input::post('old_password', ''), array('class' => '')); ?>
				<br>
				<br>
			<i class="fa fa-key"></i> 新パスワード　<?php echo Form::password('new_password', Input::post('new_password', ''), array('class' => '')); ?>
				<br>
				<br>
			<i class="fa fa-key"></i> 再入力　　　　<?php echo Form::password('check_new_password', Input::post('check_new_password', ''), array('class' => '')); ?>
				<br>
				<br>
			<div style="text-align:">
				<button style="text-align: center;" class="uk-button uk-button-primary uk-h3" type="submit">
					<i class="fa fa-pencil-square-o"></i>&nbsp;パスワードを変更する
				</button>
			</div>
		</fieldset>
	<?php echo Form::close(); ?>
</center>

<?php echo Html::anchor('user', '<i class="fa fa-undo"></i>&nbsp;戻る',array('class'=>'uk-button uk-button-primary')); ?>
