<script type="text/javascript">
	$(function(){
		$(".select_day").click(edit_render)
	});
	function edit_render() {
		var day_id  = $(this).attr("id");
		var url = 'edit_shift_day/' + day_id;
		$.ajax(url, {"complete": function(xhr,status){
			$("#irregular_shift_day").hide();
			window.xhr = xhr;
			$("#tab").after($(xhr.responseText));
		}});
	}
</script>
[<?php echo $irregular_shift->irregular_name; ?>]の編集
<br><br>
<ul class="uk-tab uk-tab-grid uk-tab-bottom" id="tab">
	<?php foreach ($irregular_shift_days as $irregular_shift_day): ?>
		<li class="uk-width-1-<?php echo count(${'irregular_shift_days'}); ?>">
			<a class="select_day" id="<?php echo $irregular_shift_day->id; ?>"><?php echo $irregular_shift_day->irregular_day_name; ?></a>
		</li>
	<?php endforeach; ?>
</ul>
