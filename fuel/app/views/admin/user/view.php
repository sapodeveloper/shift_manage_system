<h3><?php echo $user->full_name; ?>さんのユーザ情報</h3>
<table class="uk-table">
	<tr>
		<td>管理ID</td>
		<td><?php echo $user->id; ?></td>
	</tr>
	<tr>
		<td>スタッフ名</td>
		<td><?php echo $user->full_name; ?></td>
	</tr>
	<tr>
		<td>メールアドレス</td>
		<td><?php echo $user->email; ?></td>
	</tr>
	<tr>
		<td>学部</td>
		<td><?php echo $user->department->department_name; ?></td>
	</tr>
	<tr>
		<td>学科</td>
		<td><?php echo $user->cource->cource_name; ?></td>
	</tr>
	<tr>
		<td>入学年度</td>
		<td><?php echo $user->year; ?></td>
	</tr>
	<tr>
		<td>権限</td>
		<td><?php echo $user->auth->auth_type; ?></td>
	</tr>
	<tr>
		<td>状態</td>
		<td>
			<?php if($user->condition == 0): ?>
				not active user
			<?php elseif ($user->condition == 1):?>
				active user
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<td>最終ログイン</td>
		<td><?php echo strftime("%Y年%m月%d日", $user->last_login); ?></td>
	</tr>
</table>

<?php echo Html::anchor('admin/user/edit/'.$user->id, '<i class="fa fa-pencil-square-o"></i>&nbsp;編集', array('class' => 'uk-button uk-button-success')); ?><br><br>
<?php echo Html::anchor('admin/user/', '<i class="fa fa-undo"></i>&nbsp;戻る', array('class' => 'uk-button uk-button-primary')); ?><br>
