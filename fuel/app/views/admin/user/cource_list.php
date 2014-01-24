<div id="cource_list">
	<HR noshade>
	<div class="uk-grid" data-uk-grid-match>
		<div class="uk-width-medium-1-6">&nbsp;</div>
		<div class="uk-width-medium-2-6"><i class="fa fa-tag"></i>&nbsp;学科</div>
		<div class="uk-width-3-6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo Form::select('cource_id', null, $cource_data, array('class' => '', 'id' => 'cource_id')); ?>
		</div>
	</div>
</div>
