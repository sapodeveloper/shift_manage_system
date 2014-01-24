<script type="text/javascript">
	$(function(){
		$("#department_id").change(list)
	});
	function list() {
		var url = 'department_cource/';
		url += $("#department_id").val();
		$.ajax(url, {"complete": function(xhr,status){
			$("#cource_list").hide();
			window.xhr = xhr;
			$("#department").after($(xhr.responseText));
		}});
	}
</script>
<h2>新規スタッフ登録</h2>
<?php echo Form::open(array("action" => "admin/user/create")); ?>
	<fieldset>
		<div class="uk-grid" data-uk-grid-match>
			<div class="uk-width-medium-1-6">&nbsp;</div>
			<div class="uk-width-medium-2-6">
				<i class="fa fa-tag"></i>&nbsp;ログイン名(学生番号)
			</div>
			<div class="uk-width-medium-3-6">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => '', 'placeholder'=>'学生番号','size'=>7)); ?>
			</div>
		</div>
		<HR noshade>
		<div class="uk-grid" data-uk-grid-match>
			<div class="uk-width-medium-1-6">&nbsp;</div>
			<div class="uk-width-medium-2-6">
				<i class="fa fa-tag"></i>&nbsp;スタッフ名
			</div>
			<div class="uk-width-medium-3-6">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo Form::input('frist_name', Input::post('frist_name', isset($user) ? $user->frist_name : ''), array('class' => '', 'placeholder'=>'名字','size'=>5)); ?>
				&nbsp;&nbsp;<?php echo Form::input('last_name', Input::post('last_name', isset($user) ? $user->last_name : ''), array('class' => '', 'placeholder'=>'名前','size'=>5)); ?>
			</div>
		</div>
		<HR noshade>
		<div class="uk-grid" data-uk-grid-match>
			<div class="uk-width-medium-1-6">&nbsp;</div>
			<div class="uk-width-medium-2-6">
				<i class="fa fa-tag"></i>&nbsp;入学年度
			</div>
			<div class="uk-width-medium-3-6">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo Form::input('year', Input::post('year', isset($user) ? $user->year : ''), array('class' => '', 'placeholder'=>'入学年度','size'=>4)); ?>
			</div>
		</div>
		<HR noshade>
		<div id="department" class="uk-grid" data-uk-grid-match>
			<div class="uk-width-medium-1-6">&nbsp;</div>
			<div class="uk-width-medium-2-6">
				<i class="fa fa-tag"></i>&nbsp;学部
			</div>
			<div class="uk-width-medium-3-6">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo Form::select('department_id', null, $department_data, array('class' => '', 'id' => 'department_id')); ?>
			</div>
		</div>
		<HR noshade>
		<div class="uk-grid" data-uk-grid-match>
			<div class="uk-width-medium-1-6">&nbsp;</div>
			<div class="uk-width-medium-2-6">
				<i class="fa fa-tag"></i>&nbsp;アクセス権限
			</div>
			<div class="uk-width-medium-3-6">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo Form::select('auth_id', null, $auth_data, array('class' => '', 'id' => 'auth_id')); ?>
			</div>
		</div>
		<HR noshade>
		<div class="uk-grid">
			<div class="uk-width-1-3">&nbsp;</div>
			<div class="uk-width-1-3">
				<button class="uk-button uk-button-primary uk-button-expand uk-button-large" type="submit">
					登録&nbsp;<i class="fa fa-sign-in"></i>
				</button>
			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>	
<?php echo Html::anchor('admin/user/', 'ユーザ情報',array('class'=>'uk-button')); ?>
