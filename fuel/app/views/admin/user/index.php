<meta charset="utf-8">
<h2>ユーザ情報</h2>
<i class="fa fa-user"></i> <?php echo Html::anchor('admin/user/create', '新規スタッフ登録'); ?><br>
<table class="uk-table uk-table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>スタッフ名</th>
			<th>学部</th>
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
				<td><?php echo $user->department->department_name; ?></td>
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
					<?php echo Html::anchor('admin/user/view/'.$user->id, '詳細', array('class' => 'uk-button')); ?>
					<?php echo Html::anchor('admin/user/edit/'.$user->id, '編集', array('class' => 'uk-button')); ?>
					<?php echo Html::anchor('admin/user/delete/'.$user->id, '削除', array('class' => 'uk-button', 'onclick' => "return confirm('削除します。よろしいですか？')")); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
	
</table>
<?php echo Html::anchor('main', '戻る'); ?>
