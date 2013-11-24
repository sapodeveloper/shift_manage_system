<meta charset="utf-8">
<h2><?php echo $user->full_name; ?>さんのユーザ情報</h2>
<div class="uk-grid">
	<div class="uk-width-1-2">
		<table class="uk-table">
			<tr>
				<td>ログイン名</td>
				<td><?php echo $user->username; ?></td>
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
		</table>
	</div>
</div>
<br>
<?php echo Html::anchor('user/edit', 'ユーザ情報編集', array('class' => 'uk-button')); ?> 
<?php echo Html::anchor('user/change_password', 'パスワード変更', array('class' => 'uk-button')); ?><br>
<i class="fa fa-users"></i> <?php echo Html::anchor('/main', '戻る'); ?><br>
