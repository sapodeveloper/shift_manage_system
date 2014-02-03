<script type="text/javascript">
	function reset_password(value){
		if(confirm('パスワードをリセットします。よろしいですか？')){
			var url = 'user/reset_password/';
			url += value
			$.ajax(url);
		}else{
			alert('キャンセルされました');
		}
	}
</script>
<h2>ユーザ情報</h2>
<?php echo Html::anchor('admin/user/create', '<i class="fa fa-user"></i>&nbsp;新規スタッフ登録' , array('class' => 'uk-button uk-button-primary')); ?><br>
<table class="uk-table uk-table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>スタッフ名</th>
			<th>学科</th>
			<th>権限</th>
			<th>状態</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $user): ?>
			<tr>
				<td><?php echo $user->id; ?></td>
				<td><?php echo $user->full_name; ?></td>
				<td><?php echo $user->cource->cource_name; ?></td>
				<td><?php echo $user->auth->auth_type; ?></td>
				<td>
					<?php if($user->condition == 0): ?>
						not active user
					<?php elseif ($user->condition == 1):?>
						active user
					<?php endif; ?>
				</td>
				<td>
					<?php echo Html::anchor('admin/user/view/'.$user->id, '<i class="fa fa-search"></i>&nbsp;詳細', array('class' => 'uk-button uk-button-success')); ?>
					<?php echo Html::anchor('admin/user/edit/'.$user->id, '<i class="fa fa-pencil-square-o"></i>&nbsp;編集', array('class' => 'uk-button uk-button-primary')); ?>
					<button class='uk-button uk-button-danger' onclick="javascript:reset_password(<?php echo $user->id; ?>);"><i class="fa fa-clock-o"></i>&nbsp;パスワードReset</button>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
	
</table>
<?php echo Html::anchor('main', '<i class="fa fa-undo"></i>&nbsp;戻る',array('class'=>'uk-button uk-button-primary')); ?>
