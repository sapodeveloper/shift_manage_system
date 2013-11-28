<ul class="uk-nav uk-nav-side uk-nav-parent-icon " data-uk-nav>

<li class="uk-active uk-parent"><a href="#"><i class="fa fa-user"></i>&nbsp;個人関連</a>
	<ul class="uk-nav-sub">
		<li><i class="fa fa-eye"></i>&nbsp;シフト確認</li>
		<li><i class="fa fa-pencil-square-o"></i>&nbsp;シフト入力</li>
		<li><?php echo Html::anchor('user', '<i class="fa fa-wrench"></i>&nbsp;個人設定'); ?></li>
	</ul>
</li>	

<li class="uk-parent"><a href="#"><i class="fa fa-pencil"></i>&nbsp;リーダ関連</a>
	<ul class="uk-nav-sub">
		<li><i class="fa fa-sun-o"></i>&nbsp;シフト作成</li>
		<li><i class="fa fa-inbox"></i>&nbsp;シフト編成</li>
	</ul>
</li>		

<li class="uk-parent"><a href="#"><i class="fa fa-cogs"></i>&nbsp;内部項目</a>
	<ul class="uk-nav-sub">
		<li><?php echo Html::anchor('admin/user', '<i class="fa fa-sort-alpha-asc"></i>&nbsp;名簿管理'); ?></li>
	</ul>
</li>		

</ul>