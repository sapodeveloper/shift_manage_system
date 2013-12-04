<h3><?php echo $irregular_shift->irregular_name; ?></h3>
<?php foreach ($irregular_shift_days as $irregular_shift_day): ?>
	<h4><?php echo date( 'Y年m月d日', strtotime($irregular_shift_day->irregular_day_date)); ?></h4>
<?php endforeach; ?>
<?php foreach ($irregular_shift_users as $irregular_shift_user): ?>
<?php echo $irregular_shift_user->users->full_name; ?>
<br>
<?php endforeach; ?>