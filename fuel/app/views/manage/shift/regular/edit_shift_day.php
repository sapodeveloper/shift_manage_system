<article class="uk-articleuk-panel uk-panel-box">
[<?php echo $regular_shift->regular_name; ?>]の編集
<br><br>
<ul class="uk-tab uk-tab-grid uk-tab-bottom" id="tab">
	<li class="uk-width-1-<?php echo count(${'regular_shift_days'})+1; ?>">
		<?php echo Html::anchor('manage/shift/regular/edit_shift/'.$regular_shift->id.'/info', '概要'); ?>
	</li>
	<?php foreach ($regular_shift_days as $regular_shift_day): ?>
		<li class="uk-width-1-<?php echo count(${'regular_shift_days'})+1; ?>">
			<?php echo Html::anchor('manage/shift/regular/edit_shift/'.$regular_shift->id.'/edit_shift_day/'.$regular_shift_day->id, $regular_shift_day->regular_day_name); ?>
		</li>
	<?php endforeach; ?>
</ul>
	<table border="1" class="uk-table uk-width-7-10">
			<tr>
				<td>スタッフ名</td>
				<td colspan="4"></td>
			</tr>
			<?php foreach ($regular_shift_users as $regular_shift_user): ?>
				<tbody id = "<?php echo $regular_shift_user->id; ?>">
					<script type="text/javascript">
						$(function() {
							var url = '../edit_shift_user/';
							url += <?php echo $regular_shift_user->id; ?>;
							$.ajax(url, {"complete": function(xhr,status){
								window.xhr = xhr;
								$("#<?php echo $regular_shift_user->id; ?>").html($(xhr.responseText));
							}});
						});
					</script>
				</tbody>
			<?php endforeach; ?>
	</table>
	</article>
	</div>
	<div class="uk-width-medium-2-10" id="entry_list">
		<script type="text/javascript">
			$(function() {
				$.ajax("../entry_list/", {"complete": function(xhr,status){
					window.xhr = xhr;
					$("#entry_list").html($(xhr.responseText));
				}});
			});
		</script>
	</div>			
